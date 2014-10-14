package cl.duoc.descubretusede.daosqlite;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by kurt on 14-10-2014.
 */
public class DataHelper extends SQLiteOpenHelper {
    private static final int DATABASE_VERSION = 1;
    private static final String DICTIONARY_TABLE_NAME = "DTS";
    private static final String DATABASE_NAME = "DescubreTuSede";
    private static final String DICTIONARY_TABLE_CREATE =
            "CREATE TABLE " + DICTIONARY_TABLE_NAME + " ( " +
                    "ID INTEGER NOT NULL PRIMARY KEY);";


    // prueba de insert
    private static final String DATABASE_QUERY = "insert into "+DICTIONARY_TABLE_NAME +
            "(rows) "+
            "values " +
            "(datos) ";
    DataHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(DICTIONARY_TABLE_CREATE);
        db.execSQL(DATABASE_QUERY);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS "+ DICTIONARY_TABLE_NAME + ";");
        this.onCreate(db);

    }
}
