package cl.duoc.descubretusede.utils;

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

import cl.duoc.descubretusede.daosqlite.SalaDAO;

/**
 * Created by Administrador on 16/12/2014.
 */
public class SalaUtil {

    Map<Integer,String> map = new Hashtable<Integer, String>();
    SalaDAO salaDAOobj = new SalaDAO();

    SalaUtil(){
        llenaReferencias();
    }

    private void llenaReferencias(){
        map.put(2,"seccion");
        map.put(3,"docente");
        map.put(4,"asignatura");
        map.put(5,"nombre_aula");
        map.put(6,"jornada");
        map.put(7,"dia_de_clases");
        map.put(8,"hora_inicio");
        map.put(9,"hora_termino");
    }

    private void filtrarTipoBusqueda(String query,int seleccionado){
            switch (seleccionado){
                case 1:
                    break;
                case 2:

                    break;
                case 3:
                    break;
                case 4:
                    break;
                case 5:
                    break;
                case 6:
                    break;
                case 7:
                    break;
                case 8:
                    break;
                case 9:
                    break;
            }

    }



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
            object.accumulate(map.get(seleccionado).toString(),query);

            nvp.add(new BasicNameValuePair("send", object.toString()));
            httpPost.setEntity(new UrlEncodedFormEntity(nvp));
            HttpResponse response = httpClient.execute(httpPost);
            //HttpEntity entity = response.getEntity();
            //is = entity.getContent();

            joba = new JSONArray(convertInputStreamToString(response.getEntity().getContent()));
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
            //Toast.makeText(getApplicationContext(), acuTest, Toast.LENGTH_SHORT).show();
        }catch(Exception e){
            e.printStackTrace();
            //Toast.makeText(getApplicationContext(),"Fallo",Toast.LENGTH_SHORT).show();
        };


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
