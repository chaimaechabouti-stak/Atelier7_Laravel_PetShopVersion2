// src/components/CountryList.jsx
import React from 'react';
import CountryCard from './CountryCard';

export default function CountryList({ countries }) {
  if (!countries || countries.length === 0) {
    return <p className="no-results">Aucun pays à afficher.</p>;
  }
  return (
    <div className="grid-list">
      {countries.map(country => (
        <CountryCard key={country.ccn3 ?? country.cca3 ?? country.name.common} country={country} />
      ))}
    </div>
  );
}
