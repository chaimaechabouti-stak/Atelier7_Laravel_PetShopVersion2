import { useDispatch } from "react-redux"
import { addToCart } from "../redux/cartSlice"

export default function ProductCard({ product }) {
  const dispatch = useDispatch()

  return (
    <div className="card shadow-sm h-100">
      <img src={product.image} className="card-img-top" />
      <div className="card-body">
        <h5>{product.name}</h5>
        <p>{product.price} DH</p>
        <button
          className="btn btn-primary w-100"
          onClick={() => dispatch(addToCart(product))}
        >
          Ajouter au panier
        </button>
      </div>
    </div>
  )
}
