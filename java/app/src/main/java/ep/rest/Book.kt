package ep.rest

import java.io.Serializable

data class Book(
        val idArtikla: Int = 0,
        val ime: String = "",
        val activeOrNot: Int = 0,
        val opis: String = "",
        val cena: Double = 0.0,
        val sestevekOcen: Int = 0,
        val stOcen: Int = 0,
        val slika1: String = "",
        val slika2: String = "",
        val slika3: String = "") : Serializable
