import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';

function App() {
  const [countries, setCountries] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [currentPage, setCurrentPage] = useState(1);
  const [searchTerm, setSearchTerm] = useState('');
  const [regionFilter, setRegionFilter] = useState('all');
  
  const itemsPerPage = 10;

  useEffect(() => {
    const fetchCountries = async () => {
      try {
        setLoading(true);
      const response = await axios.get('https://restcountries.com/v3.1/all?fields=name,capital,region,population,flags,languages');

        // Trier les pays par nom
        const sortedCountries = response.data.sort((a, b) => 
          a.name.common.localeCompare(b.name.common)
        );
        setCountries(sortedCountries);
        setError(null);
      } catch (err) {
        setError('Erreur lors du chargement des pays. Veuillez réessayer.');
        console.error(err);
      } finally {
        setLoading(false);
      }
    };

    fetchCountries();
  }, []);

  // Filtrer les pays selon la recherche et la région
  const filteredCountries = countries.filter(country => {
    const matchesSearch = country.name.common.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesRegion = regionFilter === 'all' || country.region === regionFilter;
    return matchesSearch && matchesRegion;
  });

  // Calculer la pagination
  const totalPages = Math.ceil(filteredCountries.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const currentCountries = filteredCountries.slice(startIndex, endIndex);

  // Extraire les régions uniques pour le filtre
  const regions = [...new Set(countries.map(country => country.region))].filter(Boolean);

  // Gestionnaires de pagination
  const handleNextPage = () => {
    if (currentPage < totalPages) {
      setCurrentPage(currentPage + 1);
    }
  };

  const handlePreviousPage = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  // Réinitialiser la page quand les filtres changent
  useEffect(() => {
    setCurrentPage(1);
  }, [searchTerm, regionFilter]);

  if (loading) {
    return (
      <div className="app-container">
        <div className="loading">
          <div className="spinner"></div>
          <p>Chargement des pays...</p>
        </div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="app-container">
        <div className="error">
          <h2>Erreur</h2>
          <p>{error}</p>
          <button onClick={() => window.location.reload()}>Réessayer</button>
        </div>
      </div>
    );
  }

  return (
    <div className="app-container">
      <header className="app-header">
        <h1>🌍 WorldQuest - Liste des pays</h1>
        <p className="subtitle">Explorez {filteredCountries.length} pays du monde</p>
      </header>

      <div className="filters-container">
        <div className="search-box">
          <input
            type="text"
            placeholder="Rechercher un pays..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="search-input"
          />
        </div>

        <div className="region-filter">
          <label htmlFor="region-select">Filtrer par région :</label>
          <select
            id="region-select"
            value={regionFilter}
            onChange={(e) => setRegionFilter(e.target.value)}
            className="region-select"
          >
            <option value="all">Toutes les régions</option>
            {regions.map(region => (
              <option key={region} value={region}>{region}</option>
            ))}
          </select>
        </div>
      </div>

      <div className="countries-grid">
        {currentCountries.length > 0 ? (
          currentCountries.map(country => (
            <div key={country.cca3} className="country-card">
              <div className="country-flag">
                {country.flags?.png ? (
                  <img 
                    src={country.flags.png} 
                    alt={`Drapeau de ${country.name.common}`}
                    onError={(e) => {
                      e.target.onerror = null;
                      e.target.src = 'https://via.placeholder.com/300x200?text=Drapeau+non+disponible';
                    }}
                  />
                ) : (
                  <div className="flag-placeholder">
                    Drapeau non disponible
                  </div>
                )}
              </div>
              <div className="country-info">
                <h2 className="country-name">{country.name.common}</h2>
                <p className="country-detail">
                  <strong>Région :</strong> {country.region || 'Non spécifiée'}
                </p>
                <p className="country-detail">
                  <strong>Capitale :</strong> {country.capital?.[0] || 'Non spécifiée'}
                </p>
                <p className="country-detail">
                  <strong>Population :</strong> {country.population?.toLocaleString() || 'Non spécifiée'}
                </p>
                {country.languages && (
                  <p className="country-detail">
                    <strong>Langues :</strong> {Object.values(country.languages).join(', ')}
                  </p>
                )}
              </div>
            </div>
          ))
        ) : (
          <div className="no-results">
            <p>Aucun pays ne correspond à votre recherche.</p>
          </div>
        )}
      </div>

      <div className="pagination-container">
        <div className="pagination-info">
          Page {currentPage} sur {totalPages} • 
          Pays {startIndex + 1} à {Math.min(endIndex, filteredCountries.length)} sur {filteredCountries.length}
        </div>
        
        <div className="pagination-buttons">
          <button
            onClick={handlePreviousPage}
            disabled={currentPage === 1}
            className="pagination-btn"
          >
            ← Précédent
          </button>
          
          <div className="page-numbers">
            {Array.from({ length: Math.min(5, totalPages) }, (_, i) => {
              let pageNum;
              if (totalPages <= 5) {
                pageNum = i + 1;
              } else if (currentPage <= 3) {
                pageNum = i + 1;
              } else if (currentPage >= totalPages - 2) {
                pageNum = totalPages - 4 + i;
              } else {
                pageNum = currentPage - 2 + i;
              }
              
              if (pageNum <= totalPages) {
                return (
                  <button
                    key={pageNum}
                    onClick={() => setCurrentPage(pageNum)}
                    className={`page-btn ${currentPage === pageNum ? 'active' : ''}`}
                  >
                    {pageNum}
                  </button>
                );
              }
              return null;
            })}
          </div>
          
          <button
            onClick={handleNextPage}
            disabled={currentPage === totalPages}
            className="pagination-btn"
          >
            Suivant →
          </button>
        </div>
      </div>

      <footer className="app-footer">
        <p>Application développée avec React et l'API REST Countries</p>
        <p>Total des pays dans l'API : {countries.length}</p>
      </footer>
    </div>
  );
}

export default App;