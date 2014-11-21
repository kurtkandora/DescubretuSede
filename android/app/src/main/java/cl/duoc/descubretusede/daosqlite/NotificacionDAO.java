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
        Cursor notificacionCursor = notificacionDB.rawQuery("select notificacion,tipo from notificacion where idNotificacion="+idNotificacion,null);
        if(notificacionCursor.moveToFirst()){
            do{
                notificacion.setIdNotificacion(idNotificacion);
                notificacion.setNotificacion(notificacionCursor.getString(0));
                notificacion.setTipo(notificacionCursor.getString(1));

            }while(notificacionCursor.moveToFirst());
        }
        return notificacion;
    }

    public ArrayList<Notificacion> getNotificaciones (Actividad actividad){
        ArrayList<Notificacion> notificaciones = new ArrayList<Notificacion>();
        Cursor notificacionCursor = notificacionDB.rawQuery("select notificacion,tipo,idNotificacion from notificacion where idActividad="+actividad.getIdActividad(),null);
        if(notificacionCursor.moveToFirst()){
            do{
                Notificacion notificacion = new Notificacion();
                notificacion.setIdNotificacion(notificacionCursor.getInt(2));
                notificacion.setNotificacion(notificacionCursor.getString(0));
                notificacion.setTipo(notificacionCursor.getString(1));
                notificaciones.add(notificacion);

            }while(notificacionCursor.moveToFirst());
        }
        return notificaciones;

    }

    public boolean borrarNotificacion (int idNotificacion){
        try {
            notificacionDB = dataHelper.getWritableDatabase();
            return notificacionDB.delete("Notificacion", "idNotificacion=" + idNotificacion, null) > 0;
        }
        catch (Exception e){
            return false;
        }

    }


}
