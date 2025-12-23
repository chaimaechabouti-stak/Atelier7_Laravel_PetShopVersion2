import { useDispatch, useSelector } from "react-redux"
import { removeFromCart, updateQty } from "../redux/cartSlice"

export default function Cart() {
  const items = useSelector(state => state.cart.items)
  const dispatch = useDispatch()

  const totalPrice = items.reduce(
    (sum, item) => sum + item.price * item.qty, 0
  )

  return (
    <div className="container mt-5">
      <h2>Votre Panier</h2>

      {items.map(item => (
        <div key={item.id} className="row align-items-center mb-3">
          <div className="col">{item.name}</div>
          <div className="col">{item.price} DH</div>
          <div className="col">
            <input
              type="number"
              value={item.qty}
              min="1"
              className="form-control"
              onChange={e =>
                dispatch(updateQty({ id: item.id, qty: +e.target.value }))
              }
            />
          </div>
          <div className="col">
            <button
              className="btn btn-danger"
              onClick={() => dispatch(removeFromCart(item.id))}
            >
              Supprimer
            </button>
          </div>
        </div>
      ))}

      <h4>Total : {totalPrice} DH</h4>
    </div>
  )
}
