// src/components/CountryCard.jsx
import React from 'react';

export default function CountryCard({ country }) {
  const name = country.name?.common ?? '—';
  const capital = (country.capital && country.capital[0]) ? country.capital[0] : '—';
  const region = country.region ?? '—';
  const flag = country.flags?.svg ?? country.flags?.png ?? '';

  return (
    <article className="card">
      <div className="flag-wrap">
        {flag ? (
          <img src={flag} alt={`Drapeau de ${name}`} loading="lazy" />
        ) : (
          <div className="no-flag">No flag</div>
        )}
      </div>
      <div className="card-body">
        <h3>{name}</h3>
        <p><strong>Capitale :</strong> {capital}</p>
        <p><strong>Région :</strong> {region}</p>
      </div>
    </article>
  );
}