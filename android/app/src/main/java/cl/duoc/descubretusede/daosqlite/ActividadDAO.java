package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.sql.Date;
import java.sql.Time;

import cl.duoc.descubretusede.model.Actividad;

/**
 * Created by kurt on 16-10-2014.
 */
public class ActividadDAO {

    private static  DataHelper dataHelper;
    private static SQLiteDatabase sqLiteDatabase;
    private Context context;

    public ActividadDAO(Context context) {
        dataHelper = new DataHelper(context);
        this.context =context;

    }

    public Actividad getActividad(int idActividad){
        Actividad actividad = new Actividad();
        sqLiteDatabase = dataHelper.getReadableDatabase();
        Cursor cursor = sqLiteDatabase.rawQuery("Select ID_TIPO_ACTIVIDAD,ID_AFICHE,NOMBRE_ACTIVIDAD,DESCRIPCION_ACTIVIDAD," +
                "HORA_INICIO,HORA_TERMINO,FECHA_ACTIVIDAD from actividad where ID_ACTIVIDAD = "+idActividad,null);

        if(cursor.moveToFirst()) {
            do {
                actividad.setIdActividad(idActividad);
                AficheDAO aficheDAO = new AficheDAO(context);
                actividad.setAfiche(aficheDAO.getAfiche(cursor.getInt(1)));
                actividad.setNombre(cursor.getString(2));
                actividad.setDescripcion(cursor.getString(3));
                actividad.setHorainicio(Time.valueOf(cursor.getString(4)));
                actividad.setHoraTermino(Time.valueOf(cursor.getString(5)));
                actividad.setFecha(Date.valueOf(cursor.getString(6)));
                actividad.setTipo(getTipo(cursor.getInt(0)));

            }while(cursor.moveToFirst());
        }
        return actividad;


    }

    private String getTipo(int idTipo) {
        Cursor cursor = sqLiteDatabase.rawQuery("Select TIPO_ACTIVIDAD from tipo_actividad where ID_TIPO_ACTIVIDAD = "+idTipo,null);
        cursor.moveToFirst();
        return cursor.getString(0);
    }

    public boolean borrarActividad (int idActividad){
        try {
            sqLiteDatabase = dataHelper.getWritableDatabase();
            return sqLiteDatabase.delete("Actividad", "id_Actividad=" + idActividad, null) > 0;
        }
        catch (Exception e){
            return false;
        }
    }
    // todo: falta arreglar lo del tipo
    public boolean insertActividad (Actividad actividad){
        try {
            sqLiteDatabase = dataHelper.getWritableDatabase();
            sqLiteDatabase.execSQL("insert into Actividad(ID_ACTIVIDAD,ID_TIPO_ACTIVIDAD,ID_AFICHE,NOMBRE_ACTIVIDAD,DESCRIPCION_ACTIVIDAD," +
                    "HORA_INICIO,HORA_TERMINO,FECHA_ACTIVIDAD from actividad) values ("
                    +actividad.getIdActividad()+ actividad.getTipo() + actividad.getAfiche().getIdAfiche()+actividad.getNombre()
                    +actividad.getDescripcion()+actividad.getHorainicio()+actividad.getHoraTermino()+actividad.getFecha()+")");
            return true;
        }
        catch (Exception e){
            return false;
        }
    }
}
