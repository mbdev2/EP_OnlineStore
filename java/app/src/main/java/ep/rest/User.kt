package ep.rest


import java.io.Serializable

data class User(
        val idStranke: Int = 0,
        val ime: String = "",
        val priimek: String = "",
        val eNaslov: String = "",
        val naslov: String = "",
        val telefonskaStevilka: Int = 0) : Serializable