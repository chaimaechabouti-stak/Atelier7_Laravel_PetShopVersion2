import { createSlice } from "@reduxjs/toolkit"

const initialState = {
  items: []
}

const cartSlice = createSlice({
  name: "cart",
  initialState,
  reducers: {
    addToCart: (state, action) => {
      const product = action.payload
      const found = state.items.find(item => item.id === product.id)

      if (found) {
        found.qty += 1
      } else {
        state.items.push({ ...product, qty: 1 })
      }
    },

    removeFromCart: (state, action) => {
      state.items = state.items.filter(item => item.id !== action.payload)
    },

    updateQty: (state, action) => {
      const { id, qty } = action.payload
      const item = state.items.find(i => i.id === id)
      if (item && qty > 0) item.qty = qty
    }
  }
})

export const { addToCart, removeFromCart, updateQty } = cartSlice.actions
export default cartSlice.reducer
