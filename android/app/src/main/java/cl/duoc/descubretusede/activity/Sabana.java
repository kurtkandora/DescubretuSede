package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ExpandableListView;

import java.util.ArrayList;

import cl.duoc.descubretusede.R;
import cl.duoc.descubretusede.daosqlite.SalaDAO;
import cl.duoc.descubretusede.model.Sala;

/**
 * Created by Administrador on 05-01-2015.
 */
public class Sabana extends Activity {

    String nombreSala;
    String diaClases;
    ArrayList<Sala> sabana = new ArrayList<Sala>();
    SalaDAO objSalaDAO = new SalaDAO();
    ExpandableListView exv;

    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sabana);
        exv = (ExpandableListView) findViewById(R.id.listaSabana);

        try {
            Intent intent = getIntent();
            nombreSala= intent.getStringExtra("nombreSala");
            diaClases= intent.getStringExtra("diaClases");
            sabana=objSalaDAO.getSabana(diaClases,nombreSala);
        }catch (Exception e){
            e.printStackTrace();
        }

        exv.setAdapter(new Adaptador(this,sabana));

    }
}
