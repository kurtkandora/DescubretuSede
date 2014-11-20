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
    private Notificacion notificacion;

    public NotificacionDAO(Context context) {
        dataHelper = new DataHelper(context);
        notificacion = new Notificacion();
    }

    public Notificacion getNotificacion(int idNotificacion){

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
                notificacion.setIdNotificacion(notificacionCursor.getInt(2));
                notificacion.setNotificacion(notificacionCursor.getString(0));
                notificacion.setTipo(notificacionCursor.getString(1));

            }while(notificacionCursor.moveToFirst());
        }
        return notificaciones;

    }
}
