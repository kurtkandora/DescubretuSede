package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;

import cl.duoc.descubretusede.model.Actividad;

/**
 * Created by kurt on 16-10-2014.
 */
public class ActividadDAO {

    private static  DataHelper datahelper;
    private static SQLiteDatabase actividadDB;
    private Actividad actividad;

    public ActividadDAO(Context context) {
        datahelper = new DataHelper(context);
        actividad = new Actividad();

    }

  /*  public Actividad getActividad(int idActividad){

        actividadDB = datahelper.getReadableDatabase();
        Cursor actividadCursor = actividadDB.rawQuery("Select nombre_asig,sigla_asig from asignatura where id_asignatura = "+idActividad,null););
    }*/
}
