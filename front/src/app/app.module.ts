import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HomeComponent } from './home/home.component';
import { Routes, RouterModule } from '@angular/router';
import { NavbarComponent } from './shared/navbar/navbar.component';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FooterComponent } from './shared/footer/footer.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NbThemeModule, NbLayoutModule, NbCardModule, NbAccordionModule, NbSearchModule, NbActionsModule, NbIconModule } from '@nebular/theme';
import { PlanetsService } from './shared/planets.service';
import { NbEvaIconsModule } from '@nebular/eva-icons';
import { EditComponent } from './home/edit/edit.component';
import { SearchResultComponent } from './home/search-result/search-result.component';

const appRoutes: Routes = [
  {
    path: 'home',
    component: HomeComponent,
  },
  {
    path: '',
    redirectTo: '/home',
    pathMatch: 'full'
  },
  {
    path: 'edit/:id',
    component: EditComponent,
  },
  {
    path: 'search-results',
    component: SearchResultComponent,
  },
  { path: '**', component: HomeComponent }
];

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    NavbarComponent,
    FooterComponent,
    EditComponent,
    SearchResultComponent
  ],
  imports: [
    RouterModule.forRoot(
      appRoutes,
      // { enableTracing: true } // <-- debugging purposes only
    ),
    BrowserModule,
    NgbModule,
    HttpClientModule,
    BsDropdownModule.forRoot(),
    ReactiveFormsModule,
    FormsModule,
    BrowserAnimationsModule,
    NbThemeModule.forRoot({ name: 'cosmic' }),
    NbLayoutModule,
    NbCardModule,
    NbAccordionModule,
    NbSearchModule,
    NbActionsModule,
    NbIconModule,
    NbEvaIconsModule,
    
  ],
  providers: [PlanetsService],
  bootstrap: [AppComponent],
  exports: [BsDropdownModule]
})
export class AppModule { }
