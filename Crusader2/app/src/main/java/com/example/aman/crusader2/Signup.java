package com.example.aman.crusader2;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class Signup extends AppCompatActivity {


    EditText fname, lname, email, user, pass;
    Button button;
    RadioGroup rGroup;
    RadioButton checkedRadioButton;
    TextView tv;
    String str, data = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_signup);

        fname = (EditText) findViewById(R.id.editText3);
        lname = (EditText) findViewById(R.id.editText4);
        email = (EditText) findViewById(R.id.editText5);
        user = (EditText) findViewById(R.id.editText6);
        pass = (EditText) findViewById(R.id.editText7);
        tv = (TextView) findViewById(R.id.textView99);

        button = (Button) findViewById(R.id.button3);

        rGroup = (RadioGroup) findViewById(R.id.radioGroup);
        checkedRadioButton = (RadioButton) rGroup.findViewById(rGroup.getCheckedRadioButtonId());

        rGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                // This will get the radiobutton that has changed in its check state
                RadioButton checkedRadioButton = (RadioButton) group.findViewById(checkedId);
                // This puts the value (true/false) into the variable
                boolean isChecked = checkedRadioButton.isChecked();
                // If the radiobutton that has changed in check state is now checked...
                if (isChecked) {
                    // Changes the textview's text to "Checked: example radiobutton text"
                    // tv.setText("Checked:" + checkedRadioButton.getText());
                    str = (String) checkedRadioButton.getText();
                }
            }
        });


        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                data = "fname=" + fname.getText().toString().trim() + "&";
                data += "lname=" + lname.getText().toString().trim() + "&";
                data += "gender=" + str + "&";
                data += "email=" + email.getText().toString().trim() + "&";
                data += "username=" + user.getText().toString().trim() + "&";
                data += "password=" + pass.getText().toString().trim();

                // tv.setText(data);

                Signup.PostClass obj = new Signup.PostClass(data);
                obj.execute();

            }
        });


    }

    private class PostClass extends AsyncTask<String, Void, Void> {


        String urlParameters;

        public PostClass(String st1) {

            urlParameters = st1;
        }

        @Override
        protected Void doInBackground(String... params) {
            try {

                URL url = new URL("http://ec2-52-66-4-99.ap-south-1.compute.amazonaws.com/second.php");

                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.setRequestMethod("POST");
                // connection.setRequestProperty("USER-AGENT", "Mozilla/5.0");
                //connection.setRequestProperty("ACCEPT-LANGUAGE", "en-US,en;0.5");
                connection.setDoOutput(true);
                DataOutputStream dStream = new DataOutputStream(connection.getOutputStream());
                dStream.writeBytes(urlParameters);
                dStream.flush();
                dStream.close();
                int responseCode = connection.getResponseCode();
                final StringBuilder output = new StringBuilder("");
                //output.append(System.getProperty("line.separator") + "Request Parameters " + urlParameters);
                //output.append(System.getProperty("line.separator") + "Response Code " + responseCode);
                BufferedReader br = new BufferedReader(new InputStreamReader(connection.getInputStream()));
                String line = "";
                StringBuilder responseOutput = new StringBuilder();
                while ((line = br.readLine()) != null) {
                    responseOutput.append(line);
                }
                br.close();

                //output.append(responseOutput.toString());

                JSONObject jObject = new JSONObject(responseOutput.toString());
                final String aJsonString = jObject.getString("code");


                Signup.this.runOnUiThread(new Runnable() {

                    @Override
                    public void run() {

                        if (aJsonString.equals("0")) {
                            tv.setText("Sign up failed");
                        }

                        if (aJsonString.equals("1")) {
                            tv.setText("Sign up successful");
                        }


//
//                        if(aJsonString.equals("1")) {
//                            Intent i=new Intent(MainActivity.this,Signup.class);
//                        }
                    }
                });


            } catch (MalformedURLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            } catch (JSONException e) {
                e.printStackTrace();
            }
            return null;
        }
    }
}