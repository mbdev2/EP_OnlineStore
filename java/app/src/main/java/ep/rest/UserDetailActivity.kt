package ep.rest

import android.content.Intent
import android.graphics.BitmapFactory
import android.os.Bundle
import android.util.Base64
import android.util.Log
import androidx.appcompat.app.AppCompatActivity
import kotlinx.android.synthetic.main.activity_book_detail.*
import kotlinx.android.synthetic.main.activity_book_detail.toolbar
import kotlinx.android.synthetic.main.activity_book_detail.toolbarLayout
import kotlinx.android.synthetic.main.activity_user_detail.*
import kotlinx.android.synthetic.main.content_book_detail.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.IOException
import java.util.*

class UserDetailActivity : AppCompatActivity() {
    private var user: User = User()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_user_detail)
        setSupportActionBar(toolbar)

        supportActionBar?.setDisplayHomeAsUpEnabled(true)

        val email = intent.getStringExtra("ep.rest.email")
        val geslo = intent.getStringExtra("ep.rest.geslo")
        if (email!=null) {
            BookService.instance.getAccount(email,geslo).enqueue(OnLoadCallbacks(this))
        }
    }



    private class OnLoadCallbacks(val activity: UserDetailActivity) : Callback<User> {
        private val tag = this::class.java.canonicalName

        override fun onResponse(call: Call<User>, response: Response<User>) {
            activity.user = response.body() ?: User()

            Log.i(tag, "Got result: ${activity.user}")

            if (response.isSuccessful) {
                activity.tvIme.text = activity.user.ime+" "+activity.user.priimek
                activity.tvEmail.text = activity.user.eNaslov
                activity.toolbarLayout.title = "Profil"
                activity.tvNaslov.text = activity.user.naslov
                activity.tvTelStevilka.text = activity.user.telefonskaStevilka.toString()


            } else {
                val errorMessage = try {
                    "An error occurred: ${response.errorBody()?.string()}"
                } catch (e: IOException) {
                    "An error occurred: error while decoding the error message."
                }

                Log.e(tag, errorMessage)
                activity.tvEmail.text = errorMessage

            }
        }

        override fun onFailure(call: Call<User>, t: Throwable) {
            Log.w(tag, "Error: ${t.message}", t)
            MyApplication.globalemail =""
            MyApplication.globalpassword =""
        }
    }
}