package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.sql.Time;
import java.util.ArrayList;

import cl.duoc.descubretusede.model.Horario;
import cl.duoc.descubretusede.model.Sala;
import cl.duoc.descubretusede.model.Seccion;

/**
 * Created by kurt on 16-10-2014.
 */
public class HorarioDAO {

    private static  DataHelper datahelper;
    private static SQLiteDatabase horarioDB;
    private Horario horario;
    private Context context;

    public HorarioDAO(Context context) {
        this.context = context;
        horario = new Horario();
        datahelper = new DataHelper(context);

    }

    public Horario getHorario(int idHorario){
        horarioDB = datahelper.getReadableDatabase();
        Cursor horarioCursor = horarioDB.rawQuery("Select dia_clases,hora_inicio,hora_termino,id_sala from horario where id_horario = "+idHorario,null);
        if(horarioCursor.moveToFirst()) {
            do {
                horario.setIdHorario(idHorario);
                horario.setDiaClases(horarioCursor.getString(0));
                horario.setHoraInicio(Time.valueOf(horarioCursor.getString(1)));
                horario.setHoraTermino(Time.valueOf(horarioCursor.getString(2)));
                SalaDAO salaDAO =  new SalaDAO(context);
                int idSala = horarioCursor.getInt(3);
                Sala sala = salaDAO.getSala(idSala);
                horario.setSala(sala);

            }while(horarioCursor.moveToFirst());
        }
        return horario;

    }

    public ArrayList<Horario> getHorarios (Seccion seccion){
        horarioDB = datahelper.getReadableDatabase();
        Cursor horarioCursor = horarioDB.rawQuery("Select dia_clases,hora_inicio,hora_termino,id_sala,id_horario from horario where id_seccion = "+seccion.getIdSeccion(),null);
        ArrayList<Horario> horarios = new ArrayList<Horario>();
        if(horarioCursor.moveToFirst()) {
            do {
                horario.setIdHorario(horarioCursor.getInt(4));
                horario.setDiaClases(horarioCursor.getString(0));
                horario.setHoraInicio(Time.valueOf(horarioCursor.getString(1)));
                horario.setHoraTermino(Time.valueOf(horarioCursor.getString(2)));
                SalaDAO salaDAO =  new SalaDAO(context);
                int idSala = horarioCursor.getInt(3);
                Sala sala = salaDAO.getSala(idSala);
                horario.setSala(sala);
                horarios.add(horario);

            }while(horarioCursor.moveToFirst());
        }
        return horarios;

    }
}
