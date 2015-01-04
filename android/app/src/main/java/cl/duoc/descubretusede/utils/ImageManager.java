package cl.duoc.descubretusede.utils;

import android.content.Context;
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
    private Context context;

    public ImageManager(Context c) {
        context = c;
        creaDirectorio();
    }



    public void creaDirectorio(){
        File directorioImagenes = new File("/sdcard/duoc/");
        if(!directorioImagenes.exists())
        {
            directorioImagenes.mkdirs();
        }
    }

//todo: comprobar si el archivo existe y bajarlo si no
    public Bitmap sacarDeAndroid(String nombreSala){
      // Bitmap imagen = BitmapFactory.decodeFile(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES) + "/" + nombreSala + ".jpg");
        nombreSala = nombreSala.toLowerCase();
        Bitmap imagen = BitmapFactory.decodeFile("/sdcard/duoc/" + nombreSala + ".jpg");
        if(imagen !=null)
        {
            return imagen;
        }else{
            DownloadFromUrl(nombreSala);
          //  imagen = BitmapFactory.decodeFile(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES) + "/" + nombreSala + ".jpg");
            imagen = BitmapFactory.decodeFile("/sdcard/duoc/" + nombreSala + ".jpg");
            return imagen;
        }
    }

    public void DownloadFromUrl(String nombreSala) {
        try {
            nombreSala +=".jpg";
            nombreSala = nombreSala.toLowerCase();
            URL url = new URL("http://descubretusede.comunidadabierta.cl/imagenes/"+ nombreSala);
                 //   File file = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES)
                 //          + "/" + nombreSala);

             File file = new File("/sdcard/duoc/" + nombreSala);
            long startTime = System.currentTimeMillis();
            Log.d("ImageManager", "download begining");
            Log.d("ImageManager", "download url:" + url);
            Log.d("ImageManager", "El Path"+file.getAbsolutePath());
            Log.d("ImageManager", "downloaded file name:" + nombreSala);
                        /* Open a connection to that URL. */
            URLConnection ucon = url.openConnection();

                        /*
                         * Define InputStreams to read from the URLConnection.
                         */
            InputStream is = ucon.getInputStream();
            BufferedInputStream bis = new BufferedInputStream(is);

                        /*
                         * Read bytes to the Buffer until there is nothing more to read(-1).
                         */
            ByteArrayBuffer baf = new ByteArrayBuffer(50);
            int current = 0;
            while ((current = bis.read()) != -1) {
                baf.append((byte) current);
            }

                        /* Convert the Bytes read to a String. */
            FileOutputStream fos = new FileOutputStream(file);
            fos.write(baf.toByteArray());
            fos.close();
            Log.d("ImageManager", "download ready in"
                    + ((System.currentTimeMillis() - startTime) / 1000)
                    + " sec");

        } catch (IOException e) {
            Log.d("ImageManager", "Error: " + e);
        }

    }
}
