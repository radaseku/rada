import 'dart:io';

import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter_neumorphic/flutter_neumorphic.dart';

class Reset extends StatefulWidget {
  @override
  _ResetState createState() => _ResetState();
}

class _ResetState extends State<Reset> {
  final _emailController = TextEditingController();
  final FirebaseAuth _firebaseAuth = FirebaseAuth.instance;
  var scaffoldKey = GlobalKey<ScaffoldState>();

  double _height = 0;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      key: scaffoldKey,
      appBar: Platform.isIOS?AppBar(
        title: Text(
          "Password Reset",
          style: TextStyle(color: Colors.black),
        ),
        elevation: 0,
        backgroundColor: Colors.grey[100],
        leading: GestureDetector(
            onTap: () {
              Navigator.pop(context);
            },
            child: Icon(
              Icons.arrow_back_ios,
              color: Colors.black,
            )),
      ):AppBar(
        title: Text(
          "Password Reset",
          style: TextStyle(color: Colors.green),
        ),
        elevation: 0,
        backgroundColor: Colors.grey[100],
        leading: GestureDetector(
            onTap: () {
              Navigator.pop(context);
            },
            child: Icon(
              Icons.arrow_back,
              color: Colors.green,
            )),
      ),
      body: Container(
        height: MediaQuery.of(context).size.height,
        decoration: BoxDecoration(
        image: DecorationImage(
        image: AssetImage('assets/images/serada.jpeg'),
        fit: BoxFit.cover),
    //color: Color(0xff195e83),
        color: Colors.white,),
        child: Column(
          children: [
            SizedBox(height: 15,),
            SizedBox(height: 200,),
            Container(
              height: _height,
              child: Center(
                child: Text("Password reset successful, please check your email"),
              ),
            ),
            Padding(
              padding: EdgeInsets.all(5),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(5),
                child: TextField(
                  style: TextStyle(color: Colors.grey[600], fontSize: 18),
                  controller: _emailController,
                  cursorColor: Colors.black,
                  cursorWidth: 3.0,
                  keyboardType: TextInputType.emailAddress,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Colors.grey[200],
                    hintText: 'Email Address(Current email for this account)',
                    hintStyle: TextStyle(color: Colors.grey[500], fontSize: 15),
                    contentPadding: const EdgeInsets.only(
                        top: 18, bottom: 18, left: 15, right: 15),
                    focusedBorder: OutlineInputBorder(
                      // borderSide: BorderSide(color: Colors.grey[200]),
                      borderSide: BorderSide(color: Colors.black),
                      borderRadius: BorderRadius.all(Radius.circular(32.0)),
                    ),
                    enabledBorder: OutlineInputBorder(
                      borderSide: BorderSide(color: Colors.black),
                      borderRadius: BorderRadius.all(Radius.circular(32.0)),
                    ),
                  ),
                ),
              ),
            ),
            Padding(
              padding: EdgeInsets.all(5),
              child: Container(
                width: MediaQuery.of(context).size.width,
                height: 50,
                child: FlatButton(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.all(Radius.circular(32.0),
                    ),
                  ),
                  onPressed: () {
                    if (_emailController.text.isNotEmpty) {
                      resetPassword(_emailController.text);
                    }
                  },
                  child: Text(
                    "Submit",
                    style: TextStyle(color: Colors.white, fontSize: 18),
                  ),
                  color: Colors.green,
                ),
              ),
            )
          ],
        ),
      ),
    );
  }

  @override
  Future<void> resetPassword(String email) async {
    await _firebaseAuth.sendPasswordResetEmail(email: email);
    scaffoldKey.currentState.showSnackBar(SnackBar(
      content: Text("Check your email"),
      backgroundColor: Colors.green,
    ));
    /*Navigator.pop(context);*/
    /*setState(() {
      _height = 50;
    });*/
    /*Future.delayed(const Duration(milliseconds: 5000), () {
      setState(() {
        _height = 0;
      });
    });*/
  }
}
