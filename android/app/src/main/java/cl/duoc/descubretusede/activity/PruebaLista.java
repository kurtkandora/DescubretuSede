package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.SearchView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
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
    static int seleccionado=0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_busqueda);
        //para usar INTERNET en el mismo THREAD
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        TextView texto = (TextView) findViewById(R.id.textTest);



        //lleno el Hash de prueba
        map.put("L51","Sala L51");
        map.put("AV205","Sala AV205");
        map.put("L55","Sala L55");
        map.put("AV215","Sala AV215");


        //seteo de Spinner
        sp = (Spinner) findViewById(R.id.spinnerOpciones);
        //llenando lista de prueba
        lista.add("Tipo de Busqueda");
        lista.add("Por Seccion");
        lista.add("Por Docente");
        lista.add("Opcion 3");
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

        //Reconoce lo que se ha buscado la vez anterior
        intent = getIntent();
        if (Intent.ACTION_SEARCH.equals(intent.getAction())) {
            String query = intent.getStringExtra(SearchManager.QUERY);
            busqueda(query,seleccionado);
        }


    }

    //metodo que testea JSON OK

    private void busqueda(String query, int seleccionado){
        InputStream is = null;
        String encodeurl="";
        JSONObject object = new JSONObject();
        JSONArray joba = new JSONArray();
        try {
            HttpClient httpClient = new DefaultHttpClient();

            HttpPost httpPost = new HttpPost ("http://www.descubretusede.comunidadabierta.cl/ws/ws-seccion.php");
            List<NameValuePair> nvp = new ArrayList<NameValuePair>(2);;
            object.accumulate("indice",seleccionado);
            object.accumulate("seccion",query);

            nvp.add(new BasicNameValuePair("send", object.toString()));
            httpPost.setEntity(new UrlEncodedFormEntity(nvp));
            HttpResponse response = httpClient.execute(httpPost);
            //HttpEntity entity = response.getEntity();
            //is = entity.getContent();

            joba = new JSONArray(convertInputStreamToString(response.getEntity().getContent()).toString());
        } catch (Exception e) {
            e.printStackTrace();
        }


        try{
            String acuTest ="";
            JSONObject json = new JSONObject();
            for (int i = 0; i <joba.length() ; i++) {
                json = (JSONObject)joba.get(i);
                acuTest = acuTest + json.getString("profesor");
            }
            Toast.makeText(getApplicationContext(),acuTest,Toast.LENGTH_SHORT).show();
        }catch(Exception e){
            e.printStackTrace();
            Toast.makeText(getApplicationContext(),"Fallo",Toast.LENGTH_SHORT).show();
        };


    }




    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        //mostrando opciones seleccionadas (solo para ver si los datos son devueltos)
        //intent.putExtra("tipoBusqueda","tipoBusqueda");
           //para que comienze desde Indice 2 (Busqueda por Seccion)
            i++;
            switch (i){
                case 1:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = i;
                    break;
                case 2:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = i;
                    break;
                case 3:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = i;
                    break;

            }



    }

    private static String convertInputStreamToString(InputStream inputStream) /*throws IOException*/ {
        String result = "";
        try {
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
            String line = "";

            while ((line = bufferedReader.readLine()) != null) {
                result += line;
            }
            inputStream.close();
            return result;
        }catch (Exception e){
            e.printStackTrace();
            return result;
        }
    }


    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }


}
