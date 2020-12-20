package ep.rest

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import ep.rest.MyApplication.Companion.globalemail
import ep.rest.MyApplication.Companion.globalpassword
import kotlinx.android.synthetic.main.account_activity.*
import kotlinx.android.synthetic.main.activity_book_detail.*
import kotlinx.android.synthetic.main.activity_main.*
import java.lang.NumberFormatException

class SigninActivity: AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.account_activity)

        btnPrijava.setOnClickListener {
            try {
                val email = etUsername.text.toString()
                val geslo = etPassword.text.toString()
                globalemail = email
                globalpassword = geslo
                Log.i("buttonpress",email+" "+geslo)

                val intent = Intent(this, UserDetailActivity::class.java)
                intent.putExtra("ep.rest.email", email)
                intent.putExtra("ep.rest.geslo", geslo)
                startActivity(intent)

            } catch (e: NumberFormatException) {
                println(e)
            }
        }
    }
}