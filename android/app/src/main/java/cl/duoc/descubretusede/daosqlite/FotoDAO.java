package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.sql.Date;

import cl.duoc.descubretusede.model.Foto;
import cl.duoc.descubretusede.model.Sala;


/**
 * Created by kurt on 16-10-2014.
 */
public class FotoDAO {
    private static  DataHelper datahelper;
    private static SQLiteDatabase fotoDB;
    private Foto foto;
    private Context context;

    public FotoDAO(Context context) {
        this.context = context;
        datahelper = new DataHelper(context);
        foto = new Foto();
    }
    public Foto getFoto(int idFoto){
        fotoDB = datahelper.getReadableDatabase();
        Cursor fotoCursor = fotoDB.rawQuery("Select foto_sala,fecha_foto from foto where id_foto = "+idFoto,null);
        if(fotoCursor.moveToFirst()) {
            do {
                foto.setIdFoto(idFoto);
                foto.setFotoSala(fotoCursor.getString(0));
                foto.setFechaFoto(Date.valueOf(fotoCursor.getString(1)));

            }while(fotoCursor.moveToFirst());
        }
        return foto;
    }

    public Foto getFoto(Sala sala){
        fotoDB = datahelper.getReadableDatabase();
        Cursor fotoCursor = fotoDB.rawQuery("Select foto_sala,fecha_foto,id_foto from foto where id_sala = "+sala.getIdSala(),null);
        if(fotoCursor.moveToFirst()) {
            do {
                foto.setIdFoto(fotoCursor.getInt(2));
                foto.setFotoSala(fotoCursor.getString(0));
                foto.setFechaFoto(Date.valueOf(fotoCursor.getString(1)));

            }while(fotoCursor.moveToFirst());
        }
        return foto;
    }

}
