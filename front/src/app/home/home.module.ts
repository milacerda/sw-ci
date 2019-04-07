import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NbIconModule } from '@nebular/theme';
import { NbEvaIconsModule } from '@nebular/eva-icons';
import { HomeComponent } from './home.component';
import { SearchResultComponent } from './search-result/search-result.component';

@NgModule({
  declarations: [HomeComponent, SearchResultComponent],
  imports: [
    CommonModule,
    NbIconModule,
    NbEvaIconsModule
  ]
})
export class HomeModule { }
