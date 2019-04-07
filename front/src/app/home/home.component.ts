import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Planets } from '../shared/planets.model';
import { Router } from '@angular/router';
import { PlanetsService } from '../shared/planets.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [PlanetsService]
})
export class HomeComponent implements OnInit {

  private alive = true;

  public planets: Planets[];

  planetsForm = this.fb.group({
    nome: ['', Validators.required],
    clima: ['', Validators.required],
    terreno: ['', Validators.required],
  });

  planet;
  onHold = false;

  constructor(
    private planetsService: PlanetsService,
    private fb: FormBuilder,
    private router: Router) { }

  public getPlanets() {
    this.planetsService.getPlanets().subscribe(
      (data) => {
        this.planets = data.results;
      }
    );
  }

  public newPlanet() {
    this.onHold = true;
    var body =
      'nome=' + this.planetsForm.value.nome +
      '&clima=' + this.planetsForm.value.clima +
      '&terreno=' + this.planetsForm.value.terreno;

    this.planetsService.newPlanet(body).subscribe(
      (data) => {
        this.planetsForm.reset();
        this.planet = data;
        this.getPlanets();

        this.updateOnHold();
      }
    );
  }

  public deletePlanet(id) {

    this.planetsService.deletePlanet(id).subscribe(
      () => {
        this.getPlanets();
      }
    );
  }

  public editPlanet(id) {
    this.router.navigate(['/edit/' + id]);
  }


  ngOnInit() {
    this.getPlanets();

  }

  ngOnDestroy() {
    this.alive = false;
  }

  public updateOnHold() {
    this.onHold = !this.onHold;
  }
}
