import './App.css';
import ProjectList from './components/ProjectList';

function App() {
  return (
    <div className="App">
      <h1>Projects</h1>
      <hr style={{ width: "25%", margin: "auto" }}></hr>
      <ProjectList />
    </div>
  );
}

export default App;
