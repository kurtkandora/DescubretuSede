package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import cl.duoc.descubretusede.model.Asignatura;

/**
 * Created by kurt on 16-10-2014.
 */
public class AsignaturaDAO {
    private static  DataHelper dataHelper;
    private static SQLiteDatabase asignaturaDB;
    private Context context;

    public AsignaturaDAO(Context context) {
        this.context = context;
        dataHelper = new DataHelper(context);

    }
    public Asignatura getAsignatura(int idAsignatura){

        Asignatura asignatura = new Asignatura();
        asignaturaDB = dataHelper.getReadableDatabase();
        Cursor asignaturaCursor = asignaturaDB.rawQuery("Select nombre_asig,sigla_asig from asignatura " +
                "where id_asignatura = "+idAsignatura,null);
        if(asignaturaCursor.moveToFirst()) {
            do {
                asignatura.setIdAsignatura(idAsignatura);
                asignatura.setNombreAsig(asignaturaCursor.getString(0));
                asignatura.setSiglaAsig(asignaturaCursor.getString(1));

            }while(asignaturaCursor.moveToFirst());
        }
        return asignatura;

    }

    public boolean borrarAsignatura (int idAsignatura){
        try {
            asignaturaDB = dataHelper.getWritableDatabase();
            return asignaturaDB.delete("Asignatura", "id_asignatura=" + idAsignatura, null) > 0;
        }
        catch (Exception e){
            return false;
        }
    }
    public boolean insertAsignatura (Asignatura asignatura){
        try {
            asignaturaDB = dataHelper.getWritableDatabase();
            asignaturaDB.execSQL("insert into asignatura(id_asignatura,nombre_asig,sigla_asig) values ("
                    +asignatura.getIdAsignatura()+asignatura.getNombreAsig()+asignatura.getSiglaAsig()+")");

            SeccionDAO seccionDAO = new SeccionDAO(context);
            for (int i = 0; i < asignatura.getSecciones().size(); i++) {
                seccionDAO.insertSeccion(asignatura.getSecciones().get(i));
            }
            return true;
        }
        catch (Exception e){
            return false;
        }
    }
}
