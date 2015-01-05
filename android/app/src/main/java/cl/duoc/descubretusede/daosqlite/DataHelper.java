package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by kurt on 14-10-2014.
 */
public class DataHelper extends SQLiteOpenHelper {
    private static final int DATABASE_VERSION = 25;
    private static final String DATABASE_NAME = "DescubreTuSede";

    private static final String TABLA_SALA =
            "CREATE TABLE SALA ( " +
                    "_ID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT," +
                    "id_seccion text not null," +
                    "jornada text not null," +
                    "profesor text not null," +
                    "nombre_asignatura text not null," +
                    "nombre_aula text not null," +
                    "hora_inicio text not null," +
                    "hora_termino text not null," +
                    "dia_clases text not null);";

    private static final String TABLA_BUSQUEDA =
            "CREATE TABLE BUSQUEDA ( " +
                    "_ID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT," +
                    "busqueda_realizada text not null," +
                    "tipo_de_busqueda INTEGER NOT NULL);";

    public DataHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(TABLA_SALA);
        db.execSQL(TABLA_BUSQUEDA);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS SALA;");
        db.execSQL("DROP TABLE IF EXISTS BUSQUEDA;");
        this.onCreate(db);

    }
}
