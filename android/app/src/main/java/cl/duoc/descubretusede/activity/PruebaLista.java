package cl.duoc.descubretusede.activity;

import android.app.ListActivity;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.SearchView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

import cl.duoc.descubretusede.R;
import cl.duoc.descubretusede.daosqlite.DataHelper;
import cl.duoc.descubretusede.model.Sala;
import cl.duoc.descubretusede.utils.SalaUtil;

/**
 * Created by Administrador on 11/11/2014.
 */

public class PruebaLista extends ListActivity implements OnItemSelectedListener {
    //Lista y spinner de prueba
    List lista = new ArrayList();
    Spinner sp;
    Intent intent;
    static int seleccionado=0;
    private ArrayList<Sala> mlistaSalas;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_busqueda);
        //para usar INTERNET en el mismo THREAD
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        //BD
        DataHelper objDataHelpter = new DataHelper(this);
        SQLiteDatabase db = objDataHelpter.getWritableDatabase();


        TextView texto = (TextView) findViewById(R.id.textTest);

        //seteo de Spinner
        sp = (Spinner) findViewById(R.id.spinnerOpciones);
        //llenando lista de prueba
        lista.add("Tipo de Busqueda");
        lista.add("Por Seccion");
        lista.add("Por Docente");
        lista.add("Por Asignatura");
        lista.add("Por Aula");
        lista.add("Por Jornada");
        lista.add("Por Dia de Clases");
        lista.add("Por Hora de Inicio");
        lista.add("Por Hora de Termino");
        //seteando adaptador de spinner
        ArrayAdapter dataAdapter = new ArrayAdapter(this,android.R.layout.simple_spinner_item,lista);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        sp.setAdapter(dataAdapter);
        //seteando listener
        sp.setOnItemSelectedListener(this);

        //Para que Android reconozca el buscador
        SearchManager searchManager = (SearchManager) getSystemService(Context.SEARCH_SERVICE);
        SearchView searchView = (SearchView) findViewById(R.id.busqueda);
        searchView.setSearchableInfo(searchManager.getSearchableInfo(getComponentName()));
        searchView.setIconifiedByDefault(false);

        //objeto Util
        SalaUtil objSalaUtil = new SalaUtil(this);
        //Reconoce lo que se ha buscado la vez anterior
        intent = getIntent();
        if (Intent.ACTION_SEARCH.equals(intent.getAction())) {
            if (seleccionado == 0)
            {
                finish();
            }else {
                String query = intent.getStringExtra(SearchManager.QUERY);
                if (seleccionado <= 1) {
                    Toast.makeText(getApplicationContext(), "Debe seleccionar un tipo de busqueda", Toast.LENGTH_LONG).show();
                } else {
                    if (objSalaUtil.filtrarTipoBusqueda(query, seleccionado) != null) {
                        mlistaSalas = objSalaUtil.filtrarTipoBusqueda(query, seleccionado);
                        ArrayList<String> elarray = retorna();

                        ArrayAdapter<String> salaAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, elarray);
                        setListAdapter(salaAdapter);
                        seleccionado = 0;
                    } else {
                        Toast.makeText(getApplicationContext(), "Sala no encontrada!", Toast.LENGTH_LONG).show();
                    }
                }
            }
        }
    }

     public ArrayList<String> retorna(){
         ArrayList<String> listaResultado= new ArrayList<String>();
         for (int i = 0; i < mlistaSalas.size(); i++) {
             listaResultado.add(i,"Sala: "+mlistaSalas.get(i).getNombre_aula());
         }
         return  listaResultado;
     }


    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        //mostrando opciones seleccionadas (solo para ver si los datos son devueltos)
        //intent.putExtra("tipoBusqueda","tipoBusqueda");
           //para que comienze desde Indice 2 (Busqueda por Seccion)
        seleccionado = i+1;
    }


    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }

    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
        super.onListItemClick(l, v, position, id);
        Intent intent = new Intent(this, Imagen.class);
        intent.putExtra("nombreSala" , mlistaSalas.get(position).getNombre_aula());
        startActivity(intent);

    }



}
