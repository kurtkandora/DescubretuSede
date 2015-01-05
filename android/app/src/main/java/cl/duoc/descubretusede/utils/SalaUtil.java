package cl.duoc.descubretusede.utils;

import android.content.Context;

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

import cl.duoc.descubretusede.daosqlite.BusquedaDAO;
import cl.duoc.descubretusede.daosqlite.SalaDAO;
import cl.duoc.descubretusede.model.Sala;

/**
 * Created by Administrador on 16/12/2014.
 */
public class SalaUtil {
    SalaDAO salaDAOobj;
    Context context;
    Map<Integer,String> map = new Hashtable<Integer, String>();

    public SalaUtil(Context context){
        this.context=context;
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

    public ArrayList<Sala> filtrarTipoBusqueda(String query,int seleccionado){
        salaDAOobj = new SalaDAO(context);
        BusquedaDAO busquedaDAO = new BusquedaDAO(context);
        ArrayList<Sala> salas = new ArrayList<Sala>();
        if(busquedaDAO.existe(query,seleccionado)) {
            switch (seleccionado) {
                case 1:
                    break;
                case 2:
                    salas = salaDAOobj.getSalaSeccion(query);
                    break;
                case 3:
                    salas = salaDAOobj.getSalaDocente(query);
                    break;
                case 4:
                    salas = salaDAOobj.getSalaAsignatura(query);
                    break;
                case 5:
                    salas = salaDAOobj.getSalaAula(query);
                    break;
                case 6:
                    salas = salaDAOobj.getSalaJornada(query);
                    break;
                case 7:
                    salas = salaDAOobj.getSalaDia(query);
                    break;
                case 8:
                    salas = salaDAOobj.getSalaHoraI(query);
                    break;
                case 9:
                    salas = salaDAOobj.getSalaHoraT(query);
                    break;
            }
        }
        else{
            salas = busquedaWeb(query,seleccionado);
        }
        return salas;
    }

    private ArrayList<Sala> busquedaWeb(String query, int seleccionado){
        ArrayList<Sala> salas = new ArrayList<Sala>();
        JSONObject object = new JSONObject();
        JSONArray joba = new JSONArray();
        try {
            HttpClient httpClient = new DefaultHttpClient();

            HttpPost httpPost = new HttpPost ("http://www.descubretusede.comunidadabierta.cl/ws/ws-seccion.php");
            List<NameValuePair> nvp = new ArrayList<NameValuePair>(2);;
            object.accumulate("indice",seleccionado);
            object.accumulate(map.get(seleccionado),query);

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
            JSONObject json;
            for (int i = 0; i <joba.length() ; i++) {
                Sala objSala = new Sala();
                json = (JSONObject)joba.get(i);
                objSala.setNombre_aula(json.getString("nombre_aula"));
                objSala.setNombre_asignatura(json.getString("nombre_asignatura"));
                objSala.setJornada(json.getString("jornada"));
                objSala.setId_seccion(json.getString("id_seccion"));
                objSala.setHora_termino(json.getString("hora_termino"));
                objSala.setHora_inicio(json.getString("hora_inicio"));
                objSala.setDia_clases(json.getString("dia_clases"));
                objSala.setProfesor(json.getString("profesor"));
                salaDAOobj.insertSala(objSala);
                salas.add(objSala);

            }
            BusquedaDAO busquedaDAO= new BusquedaDAO();
            busquedaDAO.insertarBusqueda(query,seleccionado);
        }catch(Exception e){
            e.printStackTrace();
        };
        return salas;
    }


    private static String convertInputStreamToString(InputStream inputStream) /*throws IOException*/ {
        String result = "";
        try {
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
            String line;

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
