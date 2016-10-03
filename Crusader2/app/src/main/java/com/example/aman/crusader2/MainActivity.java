package com.example.aman.crusader2;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.HttpAuthHandler;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

import javax.net.ssl.HttpsURLConnection;

public class MainActivity extends AppCompatActivity {

    Button b1, b2;
    EditText et1, et2;
    String user, pass;
    TextView tv;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        et1 = (EditText) findViewById(R.id.editText1);
        et2 = (EditText) findViewById(R.id.editText2);
        b1 = (Button) findViewById(R.id.button1);
        b2 = (Button) findViewById(R.id.button2);
        tv= (TextView) findViewById(R.id.textView);


        b1.setOnClickListener(new View.OnClickListener() {

        public void onClick(View v) {

            new JSONTask().execute("http://ec2-52-66-4-99.ap-south-1.compute.amazonaws.com/text.txt");


        }

        });

    }


    public class JSONTask extends AsyncTask< String , String , String > {



        @Override
        protected String doInBackground(String... params) {

           // Toast.makeText(MainActivity.this , "*********  " , Toast.LENGTH_LONG).show();

            BufferedReader reader = null;
            HttpsURLConnection connection = null;

            try {

                URL url = new URL(params[0]);
                connection = (HttpsURLConnection) url.openConnection();
                connection.connect();

                InputStream stream= connection.getInputStream();

                reader=new BufferedReader (new InputStreamReader(stream));

                String line="";
                StringBuffer buffer=new StringBuffer();

                while((line=reader.readLine()) != null) {

                    buffer.append(line);

                }

//                if(buffer == new StringBuffer("1")) {
//
//                    Toast.makeText(MainActivity.this , "*********  " , Toast.LENGTH_LONG).show();
//                }

                return buffer.toString();
            }
            catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            finally  {

                if(connection != null)
                    connection.disconnect();
                try {
                    if(reader != null)
                        reader.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }

            }

            return null;
        }


        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            tv.setText(s);
            //if(s=="1")
            //Toast.makeText(MainActivity.this , "********* s ********* " , Toast.LENGTH_LONG).show();
        }


    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
