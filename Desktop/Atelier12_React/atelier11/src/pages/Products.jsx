import products from "../data/products"
import ProductCard from "../components/ProductCard"

export default function Products() {
  return (
    <div className="container mt-5">
      <h2 className="mb-4 fw-bold">Nos Produits</h2>

      <div className="row g-4">
        {products.map(product => (
          <div key={product.id} className="col-md-4">
            <ProductCard product={product} />
          </div>
        ))}
      </div>
    </div>
  )
}
