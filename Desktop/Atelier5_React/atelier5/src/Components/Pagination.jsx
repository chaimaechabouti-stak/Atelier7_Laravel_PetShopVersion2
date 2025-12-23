// src/components/Pagination.jsx
import React from 'react';

export default function Pagination({ page, totalPages, onPageChange }) {
  return (
    <div className="pagination">
      <button onClick={() => onPageChange(page - 1)} disabled={page <= 1} aria-label="Précédent">
        ← Précédent
      </button>

      <div className="page-numbers">
        <button onClick={() => onPageChange(1)} disabled={page === 1}>1</button>
        {page > 3 && <span className="ellipsis">…</span>}
        {page - 1 > 1 && <button onClick={() => onPageChange(page - 1)}>{page - 1}</button>}
        <button className="current">{page}</button>
        {page + 1 < totalPages && <button onClick={() => onPageChange(page + 1)}>{page + 1}</button>}
        {page < totalPages - 2 && <span className="ellipsis">…</span>}
        {totalPages > 1 && <button onClick={() => onPageChange(totalPages)} disabled={page === totalPages}>{totalPages}</button>}
      </div>

      <button onClick={() => onPageChange(page + 1)} disabled={page >= totalPages} aria-label="Suivant">
        Suivant →
      </button>
    </div>
  );
}
