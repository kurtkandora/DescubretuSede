package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.content.Intent;
import android.media.MediaScannerConnection;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.File;
import java.net.URI;

import cl.duoc.descubretusede.R;
import cl.duoc.descubretusede.activity.util.SystemUiHider;
import cl.duoc.descubretusede.model.Sala;
import cl.duoc.descubretusede.utils.ImageManager;

/**
 * An example full-screen activity that shows and hides the system UI (i.e.
 * status bar and navigation/system bar) with user interaction.
 *
 * @see SystemUiHider
 */
public class Imagen extends Activity implements View.OnTouchListener {
    /**
     * Whether or not the system UI should be auto-hidden after
     * {@link #AUTO_HIDE_DELAY_MILLIS} milliseconds.
     */
    private static final boolean AUTO_HIDE = true;

    /**
     * If {@link #AUTO_HIDE} is set, the number of milliseconds to wait after
     * user interaction before hiding the system UI.
     */
    private static final int AUTO_HIDE_DELAY_MILLIS = 3000;

    /**
     * If set, will toggle the system UI visibility upon interaction. Otherwise,
     * will show the system UI visibility upon interaction.
     */
    private static final boolean TOGGLE_ON_CLICK = true;

    /**
     * The flags to pass to {@link SystemUiHider#getInstance}.
     */
    private static final int HIDER_FLAGS = SystemUiHider.FLAG_HIDE_NAVIGATION;

    /**
     * The instance of the {@link SystemUiHider} for this activity.
     */
    private SystemUiHider mSystemUiHider;
    Sala objSala = new Sala();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_imagen);
        TextView fill0 = (TextView)findViewById(R.id.fill0);
        TextView fill1 = (TextView)findViewById(R.id.fill1);
        TextView fill2 = (TextView)findViewById(R.id.fill2);
        TextView fill3 = (TextView)findViewById(R.id.fill3);
        TextView fill4 = (TextView)findViewById(R.id.fill4);
        TextView fill5 = (TextView)findViewById(R.id.fill5);
        TextView fill6 = (TextView)findViewById(R.id.fill6);
        TextView fill7 = (TextView)findViewById(R.id.fill7);
        try {

            Intent intent = getIntent();
            objSala.setNombre_aula(intent.getStringExtra("nombreSala"));
            objSala.setDia_clases(intent.getStringExtra("diaClases"));
            objSala.setId_seccion(intent.getStringExtra("idSeccion"));
            objSala.setJornada(intent.getStringExtra("jornada"));
            objSala.setHora_inicio(intent.getStringExtra("horaInicio"));
            objSala.setHora_termino(intent.getStringExtra("horaTermino"));
            objSala.setNombre_asignatura(intent.getStringExtra("nombreAsig"));
            objSala.setProfesor(intent.getStringExtra("profesor"));


            ImageManager imageManager = new ImageManager(getApplicationContext());
            ImageView imageView = (ImageView) findViewById(R.id.imagenSala);
            imageView.setImageBitmap(imageManager.sacarDeAndroid(objSala.getNombre_aula()));

            imageView.setOnTouchListener(this);
        }catch (Exception e)
        {
            e.printStackTrace();
        }

            try {
                fill0.setText(objSala.getNombre_aula());
                fill1.setText(objSala.getNombre_asignatura());
                fill2.setText(objSala.getId_seccion());
                fill3.setText(objSala.getProfesor());
                fill4.setText(objSala.getDia_clases());
                fill5.setText(objSala.getJornada());
                fill6.setText(objSala.getHora_inicio());
                fill7.setText(objSala.getHora_termino());
            }catch (Exception e){
                e.printStackTrace();
            }

    }


    @Override
    protected void onPostCreate(Bundle savedInstanceState) {
        super.onPostCreate(savedInstanceState);
    }

    @Override
    public boolean onTouch(View view, MotionEvent motionEvent) {
        String nombreSala = objSala.getNombre_aula().toLowerCase();
        try{

            Intent intent = new Intent();
            intent.setAction(Intent.ACTION_VIEW);
            intent.setDataAndType(Uri.parse("file://"+Environment.getExternalStorageDirectory().toString()+"/duoc/"+nombreSala+".jpg"), "image/*");
            //Log.d("Let see",Environment.getExternalStorageDirectory().toString()+"/duoc");
             startActivity(intent);
         return true;
        }
        catch (Exception e)
        {
            e.printStackTrace();
            return false;
        }

    }

}
