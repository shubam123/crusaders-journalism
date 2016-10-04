package com.example.aman.crusader2;


import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.text.Html;
import android.text.method.LinkMovementMethod;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;




public class uploadvideo extends Activity implements View.OnClickListener {

    private Button buttonSelect;
    private Button buttonUpload;
    private TextView textView , tag , description ,title;
    private TextView textViewResponse , select , upload;
    private EditText textdesc,texttitle;
    // This will get the radiogroup
    private RadioGroup rGroup;
    // This will get the radiobutton in the radiogroup that is checked
    private RadioButton checkedRadioButton;
    private String checkbox;

    public static final String MY_PREFS_NAME = "MyPrefsFile";

    private static final int SELECT_VIDEO = 3;

    private String selectedPath;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_uploadvideo);


        buttonSelect=(Button) findViewById(R.id.Button_select);
        buttonUpload=(Button) findViewById(R.id.button_upload);
        tag = (TextView) findViewById(R.id.textView_tag);
        description = (TextView) findViewById(R.id.textView_describe);
        title= (TextView) findViewById(R.id.textView_title);

        select= (TextView) findViewById(R.id.textView_select);
        upload= (TextView) findViewById(R.id.textView_upload);

        textdesc = (EditText) findViewById(R.id.editText_desc);
        texttitle = (EditText) findViewById(R.id.editText_title);

        rGroup = (RadioGroup)findViewById(R.id.radioGroup);
        checkedRadioButton = (RadioButton)rGroup.findViewById(rGroup.getCheckedRadioButtonId());

        rGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener()
        {
            public void onCheckedChanged(RadioGroup group, int checkedId)
            {
                // This will get the radiobutton that has changed in its check state
                RadioButton checkedRadioButton = (RadioButton)group.findViewById(checkedId);
                // This puts the value (true/false) into the variable
                boolean isChecked = checkedRadioButton.isChecked();
                // If the radiobutton that has changed in check state is now checked...
                if (isChecked)
                {
                    // Changes the textview's text to "Checked: example radiobutton text"
                    // tv.setText("Checked:" + checkedRadioButton.getText());
                   // checkbox= (String) checkedRadioButton.getText();
                }
            }
        });

        buttonSelect.setOnClickListener(this);
        buttonUpload.setOnClickListener(this);
    }

    private void chooseVideo() {
        Intent intent = new Intent();
        intent.setType("video/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select a Video "), SELECT_VIDEO);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK) {
            if (requestCode == SELECT_VIDEO) {
                System.out.println("SELECT_VIDEO");
                Uri selectedImageUri = data.getData();
                selectedPath = getPath(selectedImageUri);
                select.setText(selectedPath);
            }
        }
    }

    public String getPath(Uri uri) {
        Cursor cursor = getContentResolver().query(uri, null, null, null, null);
        cursor.moveToFirst();
        String document_id = cursor.getString(0);
        document_id = document_id.substring(document_id.lastIndexOf(":") + 1);
        cursor.close();

        cursor = getContentResolver().query(
                android.provider.MediaStore.Video.Media.EXTERNAL_CONTENT_URI,
                null, MediaStore.Images.Media._ID + " = ? ", new String[]{document_id}, null);
        cursor.moveToFirst();
        String path = cursor.getString(cursor.getColumnIndex(MediaStore.Video.Media.DATA));
        cursor.close();

        return path;
    }

    private void uploadVideo() {
        class UploadVideo extends AsyncTask<Void, Void, String> {

            ProgressDialog uploading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                uploading = ProgressDialog.show(uploadvideo.this, "Uploading File", "Please wait...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                uploading.dismiss();
                upload.setText(Html.fromHtml("<b>Uploaded at <a href='" + s + "'>" + s + "</a></b>"));
                upload.setMovementMethod(LinkMovementMethod.getInstance());
            }

            @Override
            protected String doInBackground(Void... params) {
                com.example.aman.crusader2.uploadvid u;
                u = new com.example.aman.crusader2.uploadvid();

                String msg =u.uploadVideo(selectedPath);
                return msg;
            }
        }
        UploadVideo uv = new UploadVideo();
        uv.execute();
    }

    @Override
    public void onClick(View v) {
        if (v == buttonSelect) {
            chooseVideo();
        }
        if (v == buttonUpload) {
//            SharedPreferences.Editor editor = getSharedPreferences(MY_PREFS_NAME, MODE_PRIVATE).edit();
//            editor.putString("description", textdesc.getText().toString());
//            editor.putString("tag", checkbox);
//            editor.putString("title", texttitle.getText().toString());
            uploadVideo();
        }
    }
}


