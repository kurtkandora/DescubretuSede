package cl.duoc.descubretusede.activity;

import android.app.ListActivity;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.SearchView;
import android.widget.Spinner;

import java.util.ArrayList;
import java.util.List;

import cl.duoc.descubretusede.R;
import cl.duoc.descubretusede.model.Sala;
import cl.duoc.descubretusede.utils.SalaUtil;

/**
 * Created by Administrador on 11/11/2014.
 */

public class Buscador extends ListActivity implements OnItemSelectedListener {


    List lista = new ArrayList();
    Spinner sp;
    Intent intent;
    static int seleccionado=0;
    private ArrayList<Sala> mlistaSalas;
    protected ProgressBar mProgressBar;
    private SalaUtil objSalaUtil;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_busqueda);
        mProgressBar= (ProgressBar) findViewById(R.id.progressBar);

        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        //seteo de Spinner
        sp = (Spinner) findViewById(R.id.spinnerOpciones);
        lista.add("Tipo de Busqueda");
        lista.add("Por Seccion");
        lista.add("Por Docente");
        lista.add("Por Asignatura");
        lista.add("Por Sala");
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

        intent = getIntent();
        mProgressBar.setVisibility(View.VISIBLE);
        objSalaUtil  = new SalaUtil(this);
        GetSalasTask getSalasTask = new GetSalasTask();
        getSalasTask.execute();

    }
//todo: el buscador que no sea relativo
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
    public void onNothingSelected(AdapterView<?> parent) {

    }


    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
        super.onListItemClick(l, v, position, id);
        Intent intent = new Intent(this, Imagen.class);
        intent.putExtra("nombreSala", mlistaSalas.get(position).getNombre_aula());
        intent.putExtra("diaClases", mlistaSalas.get(position).getDia_clases());
        intent.putExtra("horaInicio", mlistaSalas.get(position).getHora_inicio());
        intent.putExtra("horaTermino", mlistaSalas.get(position).getHora_termino());
        intent.putExtra("idSeccion", mlistaSalas.get(position).getId_seccion());
        intent.putExtra("jornada", mlistaSalas.get(position).getJornada());
        intent.putExtra("nombreAsig", mlistaSalas.get(position).getNombre_asignatura());
        intent.putExtra("profesor", mlistaSalas.get(position).getProfesor());

        startActivity(intent);

    }
    public void manejarResultado (ArrayList<String> resultado){
        ArrayAdapter<String> salaAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, resultado);
        setListAdapter(salaAdapter);
        seleccionado = 0;

        mProgressBar.setVisibility(View.INVISIBLE);
    }

    private class GetSalasTask extends AsyncTask<Object,Void,ArrayList<String>>{


        @Override
        protected ArrayList<String> doInBackground(Object... params) {
            if (Intent.ACTION_SEARCH.equals(intent.getAction())) {
                if (seleccionado == 0)
                {
                    finish();
                }else {
                    String query = intent.getStringExtra(SearchManager.QUERY);
                    if (seleccionado <= 1) {
                    } else {

                        mlistaSalas = objSalaUtil.filtrarTipoBusqueda(query, seleccionado);;
                        if (mlistaSalas != null) {
                            return retorna();
                        }
                    }
                }
            }
            return new ArrayList<String>();
        }

        @Override
        protected void onPostExecute(ArrayList<String> resultado){
            manejarResultado(resultado);
        }
    }

}
