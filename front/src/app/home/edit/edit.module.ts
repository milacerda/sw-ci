import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EditComponent } from './edit.component';
import { NbIconModule } from '@nebular/theme';
import { NbEvaIconsModule } from '@nebular/eva-icons';

@NgModule({
  declarations: [EditComponent],
  imports: [
    CommonModule,
    NbIconModule,
    NbEvaIconsModule
  ]
})
export class EditModule { }
