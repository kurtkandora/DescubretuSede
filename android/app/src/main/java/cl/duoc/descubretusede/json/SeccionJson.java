package cl.duoc.descubretusede.json;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

import cl.duoc.descubretusede.model.Seccion;

/**
 * Created by kurt on 04-12-2014.
 */
public class SeccionJson {
    private static final HttpPost httpPost = new HttpPost ("http://www.descubretusede.comunidadabierta.cl/ws/ws-seccion.php");
    private static HttpClient httpClient;
    private JSONArray joba;
    private JSONObject json;
    private ArrayList<Seccion> secciones;


    public SeccionJson() {
        httpClient = new DefaultHttpClient();
        joba = new JSONArray();
        json = new JSONObject();
        secciones = new ArrayList<Seccion>();


    }
    public ArrayList<Seccion> buscarPorProfesor(String profesor){

        InputStream is = null;
        String encodeurl="";
        try {
            List<NameValuePair> nvp = new ArrayList<NameValuePair>(2);
            json.accumulate("indice",3);
            json.accumulate("seccion",profesor);

            nvp.add(new BasicNameValuePair("send", json.toString()));
            httpPost.setEntity(new UrlEncodedFormEntity(nvp));
            HttpResponse response = httpClient.execute(httpPost);
            //HttpEntity entity = response.getEntity();
            //is = entity.getContent();

            joba = new JSONArray(convertInputStreamToString(response.getEntity().getContent()));
        } catch (Exception e) {
            e.printStackTrace();
        }


        try{
            convertirJson();
        }catch(Exception e){
            e.printStackTrace();
        };

        return secciones;

    }

    private void convertirJson() throws JSONException {
        for (int i = 0; i <joba.length() ; i++) {
            json = (JSONObject)joba.get(i);
            Seccion seccion = new Seccion();
            seccion.setProfesor(json.getString("profesor"));
            seccion.setIdAsignatura(Integer.valueOf(json.getString("asignatura")));
            seccion.setJornada(json.getString("jornada").charAt(0));
            //todo: falta normalizar las tablas

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

}
