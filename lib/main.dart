import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:rada/screens/dashboard.dart';
import 'package:rada/screens/login_screen.dart';
import 'package:rada/screens/signup_screen.dart';
import 'package:rada/screens/splash.dart';
import 'package:rada/themes.dart';

void main() {
  /*SystemChrome.setPreferredOrientations([DeviceOrientation.portraitUp])
      .then((_) {
    runApp(MyApp());
  });*/
  WidgetsFlutterBinding.ensureInitialized();
  SystemChrome.setPreferredOrientations([
    DeviceOrientation.portraitUp,
    DeviceOrientation.portraitDown,
  ]);
  ErrorWidget.builder = (FlutterErrorDetails details) => Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.white,
          elevation: 0,
        ),
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Image.asset('assets/images/error.png'),
              SizedBox(
                height: 30,
              ),
              Text("Oops!, something went wrong")
            ],
          ),
        ),
      );
  runApp(WelcomePage());
}

class WelcomePage extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Rada',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      /*home: GettingStartedScreen(),*/
      home: SplashScreen(),
      //TODO: redirect to splash screen
      /* routes: {
        LoginScreen.routeName: (ctx) => LoginScreen(),
        SignupScreen.routeName: (ctx) => SignupScreen(),
      },*/
    );
  }
}
