import { Link } from "react-router-dom"

export default function Home() {
  return (
    <div className="container mt-5">
      <div className="row align-items-center">
        
        <div className="col-md-6">
          <h1 className="fw-bold">
            Bienvenue sur <span className="text-primary">The Daily Edit </span>
          </h1>
          <p className="text-muted mt-3">
            Découvrez les meilleurs accessoires technologiques pour développeurs,
            gamers et passionnés de high-tech.
          </p>

          <Link to="/products" className="btn btn-primary btn-lg mt-3">
            Voir les produits
          </Link>
        </div>

        <div className="col-md-6 text-center">
          <img
            src="https://tse4.mm.bing.net/th/id/OIP.bRxN0tJtbKemBEnf6AqQCAHaD5?pid=Api&P=0&h=180"
            className="img-fluid"
            style={{ maxHeight: "350px" }}
          />
        </div>

      </div>
    </div>
  )
}
