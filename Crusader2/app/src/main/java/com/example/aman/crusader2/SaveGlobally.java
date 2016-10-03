package com.example.aman.crusader2;

import android.app.Application;

/**
 * Created by aman on 4/10/16.
 */

public class SaveGlobally extends Application {

    private String user_id;
    private String fname;
    private String lname;
    private String username;
    private String password;
    private String gender;

    public String getUser_id() {
        return user_id;
    }

    public void setUser_id(String someVariable) {
        this.user_id = someVariable;
    }

    public String getFname() {
        return fname;
    }

    public void setFname(String someVariable) {
        this.fname = someVariable;
    }

    public String getLname() {
        return lname;
    }

    public void setLname(String someVariable) {
        this.lname = someVariable;
    }

    public String getGender() {
        return user_id;
    }

    public void setGender(String someVariable) {
        this.gender = someVariable;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String someVariable) {
        this.username = someVariable;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String someVariable) {
        this.password = someVariable;
    }

}