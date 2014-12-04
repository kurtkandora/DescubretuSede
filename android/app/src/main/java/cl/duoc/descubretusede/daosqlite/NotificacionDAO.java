package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.util.ArrayList;

import cl.duoc.descubretusede.model.Actividad;
import cl.duoc.descubretusede.model.Notificacion;

/**
 * Created by kurt on 20-11-2014.
 */
public class NotificacionDAO {

    private static DataHelper dataHelper;
    private static SQLiteDatabase notificacionDB;

    public NotificacionDAO(Context context) {
        dataHelper = new DataHelper(context);
    }

    public Notificacion getNotificacion(int idNotificacion){

        Notificacion notificacion = new Notificacion();
        notificacionDB = dataHelper.getReadableDatabase();
        Cursor notificacionCursor = notificacionDB.rawQuery("select notificacion,tipo,id_Actividad from notificacion " +
                "where id_Notificacion="+idNotificacion,null);
        if(notificacionCursor.moveToFirst()){
            do{
                notificacion.setIdNotificacion(idNotificacion);
                notificacion.setNotificacion(notificacionCursor.getString(0));
                notificacion.setTipo(notificacionCursor.getString(1));
                notificacion.setIdActividad(notificacionCursor.getInt(1));

            }while(notificacionCursor.moveToFirst());
        }
        return notificacion;
    }

    public ArrayList<Notificacion> getNotificaciones (Actividad actividad){
        ArrayList<Notificacion> notificaciones = new ArrayList<Notificacion>();
        Cursor notificacionCursor = notificacionDB.rawQuery("select notificacion,tipo,id_Notificacion from notificacion " +
                "where id_Actividad="+actividad.getIdActividad(),null);
        if(notificacionCursor.moveToFirst()){
            do{
                Notificacion notificacion = new Notificacion();
                notificacion.setIdNotificacion(notificacionCursor.getInt(2));
                notificacion.setNotificacion(notificacionCursor.getString(0));
                notificacion.setTipo(notificacionCursor.getString(1));
                notificacion.setIdActividad(actividad.getIdActividad());
                notificaciones.add(notificacion);

            }while(notificacionCursor.moveToFirst());
        }
        return notificaciones;

    }

    public boolean borrarNotificacion (int idNotificacion){
        try {
            notificacionDB = dataHelper.getWritableDatabase();
            return notificacionDB.delete("Notificacion", "id_Notificacion=" + idNotificacion, null) > 0;
        }
        catch (Exception e){
            return false;
        }

    }
    public boolean insertNotificacion (Notificacion notificacion){

        try {
            notificacionDB = dataHelper.getWritableDatabase();
            notificacionDB.execSQL("insert into Notificacion(id_Notificacion,notificacion,tipo,id_Actividad) values ("
                    +notificacion.getIdNotificacion()+notificacion.getNotificacion()+notificacion.getTipo()+
                    notificacion.getIdActividad()+")");
            return true;
        }
        catch (Exception e){
            return false;
        }
    }


}
