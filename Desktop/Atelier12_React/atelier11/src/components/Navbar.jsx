import { Link } from "react-router-dom"
import { useSelector } from "react-redux"

export default function Navbar() {
  const totalQty = useSelector(state =>
    state.cart.items.reduce((sum, i) => sum + i.qty, 0)
  )

  return (
    <nav className="navbar navbar-dark bg-dark px-4">
      <Link className="navbar-brand" to="/">The Daily Edit </Link>

      <div>
        <Link className="nav-link d-inline text-white" to="/"> Acceuil</Link>
        <Link className="nav-link d-inline text-white" to="/products">Produits</Link>
        <Link className="nav-link d-inline text-white" to="/cart">
          Panier
          <span className="badge bg-danger ms-2">{totalQty}</span>
        </Link>
      </div>
    </nav>
  )
}
