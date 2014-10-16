package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import cl.duoc.descubretusede.model.Asignatura;

/**
 * Created by kurt on 16-10-2014.
 */
public class AsignaturaDAO {
    private static  DataHelper datahelper;
    private static SQLiteDatabase asignaturaDB;
    private Asignatura asignatura;

    public AsignaturaDAO(Context context) {
        datahelper = new DataHelper(context);
        asignatura = new Asignatura();

    }
    public Asignatura getAsignatura(int idAsignatura){

        asignaturaDB = datahelper.getReadableDatabase();
        Cursor asignaturaCursor = asignaturaDB.rawQuery("Select nombre_asig,sigla_asig from asignatura where id_asignatura = "+idAsignatura,null);
        if(asignaturaCursor.moveToFirst()) {
            do {
                asignatura.setIdAsignatura(idAsignatura);
                asignatura.setNombreAsig(asignaturaCursor.getString(0));
                asignatura.setSiglaAsig(asignaturaCursor.getString(1));

            }while(asignaturaCursor.moveToFirst());
        }
        return asignatura;

    }
}
