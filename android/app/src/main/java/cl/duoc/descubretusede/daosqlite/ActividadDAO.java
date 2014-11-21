package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;

/**
 * Created by kurt on 16-10-2014.
 */
public class ActividadDAO {

    private static  DataHelper dataHelper;
    private static SQLiteDatabase actividadDB;

    public ActividadDAO(Context context) {
        dataHelper = new DataHelper(context);


    }

  /*  public Actividad getActividad(int idActividad){
        Actividad actividad = new Actividad();
        actividadDB = dataHelper.getReadableDatabase();
        Cursor actividadCursor = actividadDB.rawQuery("Select nombre_asig,sigla_asig from asignatura where id_asignatura = "+idActividad,null););
    }*/


    public boolean borrarAsignatura (int idActividad){
        try {
            actividadDB = dataHelper.getWritableDatabase();
            return actividadDB.delete("Actividad", "idActividad=" + idActividad, null) > 0;
        }
        catch (Exception e){
            return false;
        }
    }
}
