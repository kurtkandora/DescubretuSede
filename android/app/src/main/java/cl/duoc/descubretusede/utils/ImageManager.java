package cl.duoc.descubretusede.utils;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Environment;
import android.util.Log;

import org.apache.http.util.ByteArrayBuffer;

import java.io.BufferedInputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.net.URLConnection;

/**
 * Created by kurt on 03-01-2015.
 */
public class ImageManager {

    public static final String mDirectorio = Environment.getExternalStorageDirectory().getPath() + "/duoc/";

    public ImageManager() {
        creaDirectorio();
    }

    public Bitmap sacarDeAndroid(String nombreSala){
        nombreSala = nombreSala.toLowerCase();
        Bitmap imagen = BitmapFactory.decodeFile(mDirectorio + nombreSala + ".jpg");
        if(imagen ==null)
        {
            DownloadFromUrl(nombreSala);
            imagen = sacarDeAndroid(nombreSala);
            return imagen;
        }
        return imagen;
    }

    private void creaDirectorio(){
        File directorioImagenes = new File(mDirectorio);
        if(!directorioImagenes.exists())
        {
            directorioImagenes.mkdirs();
        }
    }

    private void DownloadFromUrl(String nombreSala) {
        try {
            nombreSala +=".jpg";
            nombreSala = nombreSala.toLowerCase();
            URL url = new URL("http://descubretusede.comunidadabierta.cl/imagenes/"+ nombreSala);

            File file = new File(mDirectorio+ nombreSala);
            long startTime = System.currentTimeMillis();

            URLConnection urlConnection = url.openConnection();
            InputStream inputStream = urlConnection.getInputStream();
            BufferedInputStream bufferedInputStream = new BufferedInputStream(inputStream);
            ByteArrayBuffer byteArrayBuffer = new ByteArrayBuffer(50);
            int current;
            while ((current = bufferedInputStream.read()) != -1) {
                byteArrayBuffer.append((byte) current);
            }
            FileOutputStream fileOutputStream = new FileOutputStream(file);
            fileOutputStream.write(byteArrayBuffer.toByteArray());
            fileOutputStream.close();
            Log.d("ImageManager", "download ready in"
                    + ((System.currentTimeMillis() - startTime) / 1000)
                    + " sec");
        } catch (IOException e) {
            Log.d("ImageManager", "Error: " + e);
        }

    }
}
