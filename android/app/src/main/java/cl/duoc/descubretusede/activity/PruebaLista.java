package cl.duoc.descubretusede.activity;

import android.app.Activity;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.SearchView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;
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
    static String seleccionado=null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_busqueda);
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
        lista.add("Opcion 2");
        lista.add("Opcion 3");
        //seteando adaptador de spinner
        ArrayAdapter dataAdapter = new ArrayAdapter(this,android.R.layout.simple_spinner_item, lista);
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
            //String tipoBusqueda = intent.getStringExtra("tipoBusqueda");
            //busqueda(query, objJSON);
            //testeo de JSON
            bam(query);
        }
    }

    //metodo que testea JSON - Alparecer Error de Parseo o Error en el JSON
    private void bam(String query){
        InputStream is = null;
        String encodeurl="";
        try {

            String simpleUrl = "={\"indice\":2,\"seccion\":\"005D\"}";
            encodeurl = URLEncoder.encode(simpleUrl, "UTF-8");

        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }

        try {
            HttpClient httpClient = new DefaultHttpClient();
            //PRUEBA CON WEBSERVICE DUOC (NO FUNCIONA)
            //HttpGet httpGet = new HttpGet("http://www.descubretusede.comunidadabierta.cl/ws/ws-seccion.php?send"+encodeurl);
            //https://bugzilla.mozilla.org/rest/bug/35   PRUEBA CON OTRO WEB SERVICE (SI FUNCIONA)
            HttpGet httpGet = new HttpGet("https://bugzilla.mozilla.org/rest/bug/35");
            HttpResponse response = httpClient.execute(httpGet);
            HttpEntity entity = response.getEntity();
            is = entity.getContent();
        } catch (Exception e) {
            e.printStackTrace();
        }
        HashMap<String, String> hm;
        List<HashMap<String, String>> aList;
        String result = "";
        JSONObject jArray = null;
        String acu ="";

        try {
            /*BufferedReader reader = new BufferedReader(new InputStreamReader(
                    is, "utf-8"), 8);
            StringBuilder sb = new StringBuilder();
            String line = null;
            while ((line = reader.readLine()) != null) {
                sb.append(line + "\n");
            }
            is.close();*/
            result = convertInputStreamToString(is);
            jArray = new JSONObject(result);
            JSONArray json = jArray.getJSONArray("listado");
            for (int i = 0; i < json.length(); i++) {
                //HashMap<String, String> map = new HashMap<String, String>();
                JSONObject e = json.getJSONObject(i);
                acu = acu+e.getString("profesor");

            }
            Toast.makeText(getApplicationContext(),acu,Toast.LENGTH_SHORT).show();
        } catch (Exception e) {
            // TODO: handle exception
            e.printStackTrace();
            Toast.makeText(getApplicationContext(),"Fallo",Toast.LENGTH_SHORT).show();
        }
        // Toast.makeText(getApplicationContext(),acu,Toast.LENGTH_SHORT).show();
    }






    private void busqueda(String query) {

        //pruebas
        if(seleccionado != null) {
            Log.i("search", "query=" + query);
            String str = map.get(query);
            String result="";
            if (query != null){
                if(seleccionado.equalsIgnoreCase("Por Seccion")) {
                   // result = objJSON.buscar(2,query);
                    Toast.makeText(getApplicationContext(),result,Toast.LENGTH_SHORT).show();
                }
            }else{
                Toast.makeText(getApplicationContext(),"Sala no encontrada",Toast.LENGTH_SHORT).show();
            }
        }else{
            Toast.makeText(getApplicationContext(),"Debe seleccionar una Opcion",Toast.LENGTH_SHORT).show();
        }


    }







    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        //mostrando opciones seleccionadas (solo para ver si los datos son devueltos)
        //intent.putExtra("tipoBusqueda","tipoBusqueda");
            switch (i){
                case 1:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = lista.get(i).toString();
                    break;
                case 2:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = lista.get(i).toString();
                    break;
                case 3:
                    //Toast.makeText(getApplicationContext(),lista.get(i).toString(),Toast.LENGTH_SHORT).show();
                    seleccionado = lista.get(i).toString();
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
