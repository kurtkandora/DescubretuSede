package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import cl.duoc.descubretusede.model.Sala;

/**
 * Created by kurt on 16-10-2014.
 */
public class SalaDAO {
    private static  DataHelper dataHelper;
    private static SQLiteDatabase salaDB;
    private Context context;

    public SalaDAO(Context context) {
        this.context = context;
        dataHelper = new DataHelper(context);
    }
    public Sala getSala(int idSala)
    {
        Sala sala = new Sala();
        salaDB = dataHelper.getReadableDatabase();
        Cursor salasCursor = salaDB.rawQuery("Select nombre_sala,ubicacion_sala,capacidad from sala where id_sala = "+idSala,null);
        if(salasCursor.moveToFirst()) {
            do {
                sala.setIdSala(idSala);
                sala.setCapacidad(salasCursor.getInt(salasCursor.getColumnIndex("capacidad")));
                sala.setNombreSala(salasCursor.getString(salasCursor.getColumnIndex("nombre_sala")));
                sala.setUbicacionSala(salasCursor.getString(salasCursor.getColumnIndex("ubicacion_sala")));
                FotoDAO fotoDAO = new FotoDAO(context);
                sala.setFotoSala(fotoDAO.getFoto(sala));
            }while(salasCursor.moveToFirst());
        }
        return sala;
    }

    public boolean borrarSala (int idSala){
        try {
            salaDB = dataHelper.getWritableDatabase();
            return salaDB.delete("Sala", "idSala=" + idSala, null) > 0;
        }
        catch (Exception e){
            return false;
        }

    }



}