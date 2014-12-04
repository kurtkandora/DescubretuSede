package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.sql.Date;

import cl.duoc.descubretusede.model.Afiche;

/**
 * Created by kurt on 27-11-2014.
 */
public class AficheDAO {

    private static  DataHelper dataHelper;
    private static SQLiteDatabase aficheDB;

    public AficheDAO(Context context) {
        dataHelper = new DataHelper(context);
    }

    public Afiche getAfiche(int idAfiche){

        Afiche afiche = new Afiche();
        aficheDB = dataHelper.getReadableDatabase();
        Cursor aficheCursor = aficheDB.rawQuery("Select afiche, fechapublicacion,id_actividad from afiche " +
                "where id_afiche = "+idAfiche,null);
        if(aficheCursor.moveToFirst()) {
            do {
                afiche.setIdAfiche(idAfiche);
                afiche.setAfiche(aficheCursor.getString(0));
                afiche.setFechaPublicacion(Date.valueOf(aficheCursor.getString(1)));
                afiche.setIdActividad(aficheCursor.getInt(2));

            }while(aficheCursor.moveToFirst());
        }
        return afiche;

    }
    /*public ArrayList<Afiche> getAfiches (Actividad actividad){
        aficheDB = dataHelper.getReadableDatabase();
        Cursor aficheCursor = aficheDB.rawQuery("Select afiche, fechapublicacion,id_afiche from afiche " +
                "where id_actividad = "+actividad.getIdActividad(),null);
        ArrayList<Afiche> afiches = new ArrayList<Afiche>();
        if(aficheCursor.moveToFirst()) {
            do {
                Afiche afiche = new Afiche();
                afiche.setIdAfiche(aficheCursor.getInt(2));
                afiche.setAfiche(aficheCursor.getString(0));
                afiche.setFechaPublicacion(Date.valueOf(aficheCursor.getString(1)));
                afiche.setIdActividad(actividad.getIdActividad());
                afiches.add(afiche);
            }while(aficheCursor.moveToFirst());
        }
        return afiches;
    }*/

    public boolean borrarAfiche(int idAfiche){
        try {
            aficheDB = dataHelper.getWritableDatabase();
            return aficheDB.delete("Afiche", "id_afiche=" + idAfiche, null) > 0;
        }
        catch (Exception e){
            return false;
        }

    }

    public boolean insertAfiche(Afiche afiche)
    {
        try {
            aficheDB = dataHelper.getWritableDatabase();
            aficheDB.execSQL("insert into afiche(id_afiche,afiche,fechapublicacion,id_actividad) values ("
                    +afiche.getIdAfiche()+afiche.getAfiche()+afiche.getFechaPublicacion()+afiche.getIdActividad()+")");
            return true;
        }
        catch (Exception e){
            return false;
        }
    }
}
