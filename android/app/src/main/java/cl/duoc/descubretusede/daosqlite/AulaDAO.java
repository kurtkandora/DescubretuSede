package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import cl.duoc.descubretusede.model.Aula;

/**
 * Created by kurt on 16-10-2014.
 */
public class AulaDAO {
    private static  DataHelper dataHelper;
    private static SQLiteDatabase aulaDB;
    private Context context;

    public AulaDAO(Context context) {
        this.context = context;
        dataHelper = new DataHelper(context);
    }
    public Aula getSala(int idAula)
    {
        Aula aula = new Aula();
        aulaDB = dataHelper.getReadableDatabase();
        Cursor salasCursor = aulaDB.rawQuery("Select nombre_aula,CAPACIDAD_AULA,id_horario,DENOMINACION_AULA,id_foto from aula where id_aula = "+idAula,null);
        if(salasCursor.moveToFirst()) {
            do {
                aula.setIdAula(idAula);
                aula.setCapacidad(salasCursor.getInt(salasCursor.getColumnIndex("CAPACIDAD_AULA")));
                aula.setNombre(salasCursor.getString(salasCursor.getColumnIndex("nombre_sala")));
                aula.setDenominacion(salasCursor.getString(salasCursor.getColumnIndex("DENOMINACION_AULA")));
                aula.setIdHorario(salasCursor.getInt(salasCursor.getColumnIndex("id_horario")));
                FotoDAO fotoDAO = new FotoDAO(context);
                aula.setFoto(fotoDAO.getFoto(salasCursor.getInt(salasCursor.getColumnIndex("id_foto"))));
            }while(salasCursor.moveToFirst());
        }
        return aula;
    }

    public boolean borrarSala (int idSala){
        try {
            aulaDB = dataHelper.getWritableDatabase();
            return aulaDB.delete("Aula", "id_aula=" + idSala, null) > 0;
        }
        catch (Exception e){
            return false;
        }
    }

    public boolean insertSala(Aula aula){
        try {
            aulaDB = dataHelper.getWritableDatabase();
            aulaDB.execSQL("insert into asignatura(id_sala,nombre_aula,CAPACIDAD_AULA,id_horario,DENOMINACION_AULA,id_foto) values ("
                    + aula.getIdAula() + aula.getNombre() + aula.getCapacidad() + aula.getIdHorario()
                    + aula.getDenominacion() + aula.getFoto()+ ")");

            FotoDAO fotoDAO = new FotoDAO(context);
            fotoDAO.insertFoto(aula.getFoto());
            return true;
        }
        catch (Exception e){
            return false;
        }
    }



}