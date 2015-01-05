package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;

import cl.duoc.descubretusede.R;
import cl.duoc.descubretusede.activity.util.SystemUiHider;
import cl.duoc.descubretusede.model.Sala;
import cl.duoc.descubretusede.utils.ImageManager;

public class Imagen extends Activity implements View.OnTouchListener {


    private SystemUiHider mSystemUiHider;
    private Sala mObjSala;
    protected ProgressBar mProgressBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        mObjSala = new Sala();


        //todo: no se va a ver la barra de progreso si no es una tarea asincrona
        //mProgressBar= (ProgressBar) findViewById(R.id.progressBarImagen);
        //mProgressBar.setVisibility(View.VISIBLE);

        setContentView(R.layout.activity_imagen);
        Button btnSabana = (Button) findViewById(R.id.botonSabana);

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
            mObjSala.setNombre_aula(intent.getStringExtra("nombreSala"));
            mObjSala.setDia_clases(intent.getStringExtra("diaClases"));
            mObjSala.setId_seccion(intent.getStringExtra("idSeccion"));
            mObjSala.setJornada(intent.getStringExtra("jornada"));
            mObjSala.setHora_inicio(intent.getStringExtra("horaInicio"));
            mObjSala.setHora_termino(intent.getStringExtra("horaTermino"));
            mObjSala.setNombre_asignatura(intent.getStringExtra("nombreAsig"));
            mObjSala.setProfesor(intent.getStringExtra("profesor"));


            ImageManager imageManager = new ImageManager();
            ImageView imageView = (ImageView) findViewById(R.id.imagenSala);
            imageView.setImageBitmap(imageManager.leerImagen(mObjSala.getNombre_aula()));

            imageView.setOnTouchListener(this);
        }catch (Exception e)
        {
            e.printStackTrace();
        }

            try {
                fill0.setText(mObjSala.getNombre_aula());
                fill1.setText(mObjSala.getNombre_asignatura());
                fill2.setText(mObjSala.getId_seccion());
                fill3.setText(mObjSala.getProfesor());
                fill4.setText(mObjSala.getDia_clases());
                fill5.setText(mObjSala.getJornada());
                fill6.setText(mObjSala.getHora_inicio());
                fill7.setText(mObjSala.getHora_termino());
            }catch (Exception e){
                e.printStackTrace();
            }

        //mProgressBar.setVisibility(View.INVISIBLE);

        btnSabana.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                try{
                    Intent i = new Intent(getApplicationContext(),Sabana.class);
                    i.putExtra("diaClases",mObjSala.getDia_clases());
                    i.putExtra("nombreSala",mObjSala.getNombre_aula());
                    startActivity(i);
                }catch (Exception e){
                    e.printStackTrace();
                }
            }
        });
    }


    @Override
    protected void onPostCreate(Bundle savedInstanceState) {
        super.onPostCreate(savedInstanceState);
    }

    @Override
    public boolean onTouch(View view, MotionEvent motionEvent) {
        String nombreSala = mObjSala.getNombre_aula().toLowerCase();
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
