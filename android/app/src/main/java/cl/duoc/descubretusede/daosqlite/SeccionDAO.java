package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.util.ArrayList;

import cl.duoc.descubretusede.model.Asignatura;
import cl.duoc.descubretusede.model.Seccion;

/**
 * Created by kurt on 16-10-2014.
 */
public class SeccionDAO {
    private static  DataHelper datahelper;
    private static SQLiteDatabase seccionDB;
    private Seccion seccion;

    public SeccionDAO(Context context) {
        datahelper = new DataHelper(context);
        seccion = new Seccion();

    }

    public Seccion getSeccion(int idSeccion){

        seccionDB = datahelper.getReadableDatabase();
        Cursor seccionCursor = seccionDB.rawQuery("Select numero_secc,jornada,profesor from seccion where id_seccion = "+idSeccion,null);
        if(seccionCursor.moveToFirst()) {
            do {
                seccion.setIdSeccion(idSeccion);
                seccion.setNumeroSeccion(seccionCursor.getInt(0));
                seccion.setJornada(seccionCursor.getString(1).charAt(0));
                seccion.setProfesor(seccionCursor.getString(2));

            }while(seccionCursor.moveToFirst());
        }
        return seccion;
    }
    public ArrayList<Seccion> getSecciones(Asignatura asignatura){
        seccionDB = datahelper.getReadableDatabase();
        Cursor seccionCursor = seccionDB.rawQuery("Select id_seccion,numero_secc,jornada,profesor from seccion where id_asignatura = "+asignatura.getIdAsignatura(),null);
        ArrayList<Seccion> secciones = new ArrayList<Seccion>();
        if(seccionCursor.moveToFirst()) {
            do {
                seccion.setIdSeccion(seccionCursor.getInt(0));
                seccion.setNumeroSeccion(seccionCursor.getInt(1));
                seccion.setJornada(seccionCursor.getString(2).charAt(0));
                seccion.setProfesor(seccionCursor.getString(3));
                secciones.add(seccion);

            }while(seccionCursor.moveToFirst());
        }
        return secciones;
    }
}
