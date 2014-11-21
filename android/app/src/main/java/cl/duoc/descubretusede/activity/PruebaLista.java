package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.SearchView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Hashtable;
import java.util.List;
import java.util.Map;

import cl.duoc.descubretusede.R;

/**
 * Created by Administrador on 11/11/2014.
 */

public class PruebaLista extends Activity implements OnItemSelectedListener {
    //Lista y spinner de prueba
    List lista = new ArrayList();
    Spinner sp;
    SearchView sv;
    //Lista del resultado de busqueda
    Map<String,String> map = new Hashtable<String, String>();
    Intent intent;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_busqueda);
        TextView texto = (TextView) findViewById(R.id.textTest);

        //lleno el Hash de prueba


        map.put("L51","Sala L51");
        map.put("AV205","Sala AV205");
        map.put("L55","Sala L55");
        map.put("AV215","Sala AV215");
/*
        //seteo el buscador
        sv = (SearchView) findViewById(R.id.action_search);
        //seteo el valor de ejemplo de busqueda
        sv.setQueryHint("L51");
*/


        //seteo de Spinner
        sp = (Spinner) findViewById(R.id.spinnerOpciones);
        //llenando lista de prueba
        lista.add("Tipo de Busqueda");
        lista.add("Opcion 1");
        lista.add("Opcion 2");
        lista.add("Opcion 3");
        //seteando adaptador de spinner
        ArrayAdapter dataAdapter = new ArrayAdapter(this,android.R.layout.simple_spinner_item, lista);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        sp.setAdapter(dataAdapter);
        //seteando listener
        sp.setOnItemSelectedListener(this);
/*
        //Intent intent = getIntent();
        //if(Intent.ACTION_SEARCH.equals(intent.getAction()))
        sv.setOnClickListener( new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                onSearchRequested();
            }
        });

        if(Intent.ACTION_SEARCH.equals(true))
        {
            String query = SearchManager.QUERY.toString();
            Log.i("search", "query=" + query);
            String str = map.get(query);
            if(str!=null)
            {
                texto.setText(str);
                setContentView(texto);
            }else{
                str="Fail";
                texto.setText(str);
                setContentView(texto);
            }

        }

*/
        //Para que Android reconozca el buscador
        SearchManager searchManager = (SearchManager) getSystemService(Context.SEARCH_SERVICE);
        SearchView searchView = (SearchView) findViewById(R.id.busqueda);
        searchView.setSearchableInfo(searchManager.getSearchableInfo(getComponentName()));
        searchView.setIconifiedByDefault(false);

        //Reconoce lo que se ha buscado la vez anterior
        intent = getIntent();
        if (Intent.ACTION_SEARCH.equals(intent.getAction())) {
            String query = intent.getStringExtra(SearchManager.QUERY);
            String tipoBusqueda = intent.getStringExtra("tipoBusqueda");
            busqueda(query,tipoBusqueda);
        }

    }

    /**
     *
     * @param query String de búsqueda a realizar
     * @param tipoBusqueda
     */
    private void busqueda(String query, String tipoBusqueda) {

        //pruebas
        Toast toast = Toast.makeText(getApplicationContext(), query + tipoBusqueda, Toast.LENGTH_LONG);
        toast.show();


    }







    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        //mostrando opciones seleccionadas (solo para ver si los datos son devueltos)
        intent.putExtra("tipoBusqueda","tipoBusqueda");
            switch (i){
                case 1:
                    Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    break;
                case 2:
                    Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    break;
                case 3:
                    Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    break;

            }



    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}
